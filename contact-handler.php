<?php
// contact-handler.php - Place this in your website root directory

// Start output buffering to prevent header issues
ob_start();

// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// IMPORTANT: Check if PHPMailer is already loaded
if (!class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
    // Use absolute paths with require_once
    require_once __DIR__ . '/phpmailer/src/Exception.php';
    require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/phpmailer/src/SMTP.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Allow from any origin (for development)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);

// If no JSON data, try form data
if (!$data) {
    $data = $_POST;
}

// Validate required fields
if (!isset($data['firstName']) || !isset($data['email']) || !isset($data['message'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

// Sanitize inputs
$firstName = filter_var($data['firstName'], FILTER_SANITIZE_STRING);
$lastName = isset($data['lastName']) ? filter_var($data['lastName'], FILTER_SANITIZE_STRING) : '';
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$phone = isset($data['phone']) ? filter_var($data['phone'], FILTER_SANITIZE_STRING) : '';
$message = filter_var($data['message'], FILTER_SANITIZE_STRING);

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable for debugging: SMTP::DEBUG_SERVER
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '011a587122008d';
    $mail->Password   = '65b15e1a2f0e29'; // Your Mailtrap password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 2525;

    // Recipients
    $mail->setFrom($email, $firstName . ' ' . $lastName);
    $mail->addAddress('info@moreroomstoneniergia.ng', 'Moreroom Stone Nigeria'); // Recipient email
    $mail->addReplyTo($email, $firstName . ' ' . $lastName);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission from ' . $firstName . ' ' . $lastName;

    // Build email body
    $mail->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #d62828, #e63946); color: white; padding: 20px; text-align: center; }
            .content { background: #f9f9f9; padding: 30px; border-radius: 5px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #333; }
            .value { color: #666; margin-top: 5px; }
            .footer { text-align: center; margin-top: 20px; color: #999; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Name:</div>
                    <div class='value'>" . htmlspecialchars($firstName . ' ' . $lastName) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>" . htmlspecialchars($email) . "</div>
                </div>
                " . ($phone ? "
                <div class='field'>
                    <div class='label'>Phone:</div>
                    <div class='value'>" . htmlspecialchars($phone) . "</div>
                </div>" : "") . "
                <div class='field'>
                    <div class='label'>Message:</div>
                    <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>This message was sent from the Moreroom Stone Nigeria contact form.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Plain text version for non-HTML mail clients
    $mail->AltBody = "Name: $firstName $lastName\nEmail: $email\n" . ($phone ? "Phone: $phone\n" : "") . "Message: $message";

    $mail->send();

    // ✅ AUTO REPLY FIXED
    $autoReply = new PHPMailer(true);

    $autoReply->isSMTP();
    $autoReply->Host       = 'sandbox.smtp.mailtrap.io';
    $autoReply->SMTPAuth   = true;
    $autoReply->Username   = '011a587122008d';
    $autoReply->Password   = '65b15e1a2f0e29';
    $autoReply->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $autoReply->Port       = 2525;

    $autoReply->setFrom('info@moreroomstoneniergia.com', 'Moreroom Stone Nigeria');
    $autoReply->addAddress($email, $firstName . ' ' . $lastName);
    $autoReply->isHTML(true);
    $autoReply->Subject = 'Thank you for contacting Moreroom Stone Nigeria';
    $autoReply->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #d62828, #e63946); color: white; padding: 20px; text-align: center; }
            .content { background: #f9f9f9; padding: 30px; border-radius: 5px; }
            .message { background: white; padding: 15px; border-left: 4px solid #d62828; margin: 20px 0; }
            .footer { text-align: center; margin-top: 20px; color: #999; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Thank You for Contacting Us</h2>
            </div>
            <div class='content'>
                <p>Dear " . htmlspecialchars($firstName) . ",</p>
                <p>Thank you for reaching out to Moreroom Stone Nigeria. We have received your message and will get back to you within 24 hours.</p>
                
                <div class='message'>
                    <strong>Your message:</strong>
                    <p>" . nl2br(htmlspecialchars($message)) . "</p>
                </div>
                
                <p>If you have any urgent matters, please call us at +2348139466765</p>
                
                <p>Best regards,<br>
                <strong>The Moreroom Stone Nigeria Team</strong></p>
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " Moreroom Stone Nigeria. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";
    $autoReply->AltBody = "Dear $firstName,\n\nThank you for contacting Moreroom Stone Nigeria. We have received your message and will get back to you within 24 hours.\n\nYour message: $message\n\nBest regards,\nThe Moreroom Stone Nigeria Team";

    $autoReply->send();

    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
}
?>