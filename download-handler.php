<?php
// download-handler.php - Clean version with no warnings

// Disable error display to prevent warnings from breaking JSON
error_reporting(0);
ini_set('display_errors', 0);

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load PHPMailer
if (!class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
    require_once __DIR__ . '/phpmailer/src/Exception.php';
    require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/phpmailer/src/SMTP.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Get POST data
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    
    if (strpos($contentType, 'application/json') !== false) {
        $jsonData = json_decode(file_get_contents("php://input"), true);
        if ($jsonData) {
            $data = $jsonData;
        }
    } else {
        $data = $_POST;
    }
}

// Validate required fields
if (!isset($data['fullName']) || !isset($data['userEmail']) || !isset($data['userPhone']) || !isset($data['catalogueFile'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Missing required fields'
    ]);
    exit;
}

// FIXED: Replace FILTER_SANITIZE_STRING with htmlspecialchars
$fullName = htmlspecialchars(trim($data['fullName']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($data['userEmail']), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($data['userPhone']), ENT_QUOTES, 'UTF-8');
$catalogueFile = htmlspecialchars(trim($data['catalogueFile']), ENT_QUOTES, 'UTF-8');
$catalogueName = isset($data['catalogueName']) ? htmlspecialchars(trim($data['catalogueName']), ENT_QUOTES, 'UTF-8') : '';
$subscribeNewsletter = isset($data['subscribeNewsletter']) && ($data['subscribeNewsletter'] === 'true' || $data['subscribeNewsletter'] === '1' || $data['subscribeNewsletter'] === true) ? 1 : 0;

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid email address'
    ]);
    exit;
}

// Validate phone
if (empty($phone)) {
    echo json_encode([
        'success' => false,
        'message' => 'Phone number is required'
    ]);
    exit;
}

// ========== FIND THE CATALOGUE FILE ==========
$possibleBasePaths = [
    $_SERVER['DOCUMENT_ROOT'] . '/assets/catalogues/',
    __DIR__ . '/assets/catalogues/',
    dirname(__DIR__) . '/assets/catalogues/',
];

$cataloguePath = null;
$foundFile = null;

foreach ($possibleBasePaths as $basePath) {
    $fullPath = $basePath . $catalogueFile;
    if (file_exists($fullPath)) {
        $cataloguePath = $fullPath;
        $foundFile = $catalogueFile;
        break;
    }
    
    if (file_exists($basePath)) {
        $files = scandir($basePath);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && strtolower($file) === strtolower($catalogueFile)) {
                $cataloguePath = $basePath . $file;
                $foundFile = $file;
                break 2;
            }
        }
    }
}

if (!$cataloguePath) {
    foreach ($possibleBasePaths as $basePath) {
        if (file_exists($basePath)) {
            $files = scandir($basePath);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                    $cataloguePath = $basePath . $file;
                    $foundFile = $file;
                    break 2;
                }
            }
        }
    }
}

if (!$cataloguePath || !file_exists($cataloguePath)) {
    echo json_encode([
        'success' => false,
        'message' => 'Catalogue file not found. Please contact support.'
    ]);
    exit;
}

// Get base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$downloadUrl = $protocol . $host . '/assets/catalogues/' . urlencode($foundFile);

// Save user data to CSV
$csvFile = __DIR__ . '/downloads-log.csv';
$newEntry = [
    date('Y-m-d H:i:s'),
    $fullName,
    $email,
    $phone,
    $catalogueName,
    $subscribeNewsletter ? 'Yes' : 'No',
    $_SERVER['REMOTE_ADDR'],
    $_SERVER['HTTP_USER_AGENT'],
    $foundFile,
    $downloadUrl
];

if (!file_exists($csvFile)) {
    $headers = ['Date', 'Full Name', 'Email', 'Phone', 'Catalogue', 'Subscribed', 'IP Address', 'User Agent', 'File Downloaded', 'Download URL'];
    $fp = fopen($csvFile, 'w');
    fputcsv($fp, $headers);
    fputcsv($fp, $newEntry);
    fclose($fp);
} else {
    $fp = fopen($csvFile, 'a');
    fputcsv($fp, $newEntry);
    fclose($fp);
}

// ========== SIMPLE EMAIL USING PHP MAIL (No SMTP issues) ==========
function sendSimpleEmail($to, $subject, $body, $from) {
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    $headers .= "Reply-To: info@moreroomstonenigeria.ng\r\n";
    return @mail($to, $subject, $body, $headers);
}

// Send admin notification
$adminBody = "<html><body style='font-family: Arial, sans-serif;'>
    <h2 style='color: #d62828;'>New Catalogue Download</h2>
    <p><strong>Name:</strong> " . $fullName . "</p>
    <p><strong>Email:</strong> " . $email . "</p>
    <p><strong>Phone:</strong> " . $phone . "</p>
    <p><strong>Catalogue:</strong> " . $catalogueName . "</p>
    <p><strong>Subscribed:</strong> " . ($subscribeNewsletter ? 'Yes' : 'No') . "</p>
    <p><strong>Date:</strong> " . date('Y-m-d H:i:s') . "</p>
    <p><strong>IP:</strong> " . $_SERVER['REMOTE_ADDR'] . "</p>
    <p><strong>Download URL:</strong> <a href='" . $downloadUrl . "'>" . $downloadUrl . "</a></p>
    </body></html>";

sendSimpleEmail('info@moreroomstonenigeria.ng', 'New Catalogue Download - ' . $fullName, $adminBody, 'noreply@moreroomstonenigeria.ng');

// Send user confirmation
$userBody = "<html><body style='font-family: Arial, sans-serif;'>
    <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
        <div style='background: linear-gradient(135deg, #d62828, #e63946); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0;'>
            <h2>Thank You for Your Interest!</h2>
        </div>
        <div style='padding: 30px; background: #f9f9f9; border-radius: 0 0 10px 10px;'>
            <p>Dear <strong>" . $fullName . "</strong>,</p>
            <p>Thank you for downloading our <strong>" . $catalogueName . "</strong>.</p>
            <p>Your download should start automatically. If it doesn't, <a href='" . $downloadUrl . "'>click here to download</a>.</p>
            <p><strong>Visit our showroom:</strong><br>
            10 Westerner Industrial Avenue, Isheri Oke, Ojodu Berger, Lagos, Nigeria</p>
            <p><strong>Contact us:</strong><br>
            Phone: +234 813 946 6765<br>
            Email: info@moreroomstonenigeria.ng</p>
            <p>Best regards,<br>
            <strong>The Moreroom Stone Nigeria Team</strong></p>
        </div>
    </div>
    </body></html>";

sendSimpleEmail($email, 'Thank you for downloading our catalogue - ' . $catalogueName, $userBody, 'noreply@moreroomstonenigeria.ng');

// Return success with download URL
echo json_encode([
    'success' => true,
    'message' => 'Thank you! Your download will start now.',
    'downloadUrl' => $downloadUrl,
    'catalogueFile' => $foundFile
]);
?>