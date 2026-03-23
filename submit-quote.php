<?php
// submit-quote.php - Form handler for Quote/Consultation

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Start output buffering
ob_start();

// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ==========================================================================
// EMAIL CONFIGURATION
// ==========================================================================
// Update these with your actual email settings
$admin_email = "info@moreroomstonenigeria.com";
$admin_name = "Moreroom Stone Nigeria";
$company_name = "Moreroom Stone Nigeria";
$company_phone = "+234 813 946 6765";
$company_address = "10 Westerner Industrial Avenue, Isheri Oke, Ojodu Berger, Lagos State";

// SMTP Configuration (for production, use your email service)
$smtp_host = 'smtp.gmail.com';        // Your SMTP server
$smtp_port = 587;                      // 587 for TLS, 465 for SSL
$smtp_user = 'your-email@gmail.com';   // Your email
$smtp_pass = 'your-app-password';      // Your app password

// ==========================================================================
// LOAD PHPMailer
// ==========================================================================
if (!class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
    // Use absolute paths - adjust these to match your PHPMailer location
    require_once __DIR__ . '/phpmailer/src/Exception.php';
    require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/phpmailer/src/SMTP.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// ==========================================================================
// SET HEADERS
// ==========================================================================
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// ==========================================================================
// GET POST DATA
// ==========================================================================
$data = json_decode(file_get_contents("php://input"), true);

// If no JSON data, try form data
if (!$data) {
    $data = $_POST;
}

// ==========================================================================
// VALIDATE REQUIRED FIELDS
// ==========================================================================
$required_fields = ['name', 'email', 'phone', 'role'];

foreach ($required_fields as $field) {
    if (!isset($data[$field]) || empty(trim($data[$field]))) {
        http_response_code(400);
        echo json_encode([
            'success' => false, 
            'message' => 'Missing required field: ' . $field
        ]);
        exit;
    }
}

// ==========================================================================
// SANITIZE INPUTS
// ==========================================================================
$name = filter_var($data['name'], FILTER_SANITIZE_STRING);
$role = filter_var($data['role'], FILTER_SANITIZE_STRING);
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$phone = filter_var($data['phone'], FILTER_SANITIZE_STRING);
$project_description = isset($data['project_description']) ? filter_var($data['project_description'], FILTER_SANITIZE_STRING) : '';
$how_found = isset($data['how_found']) ? filter_var($data['how_found'], FILTER_SANITIZE_STRING) : '';
$newsletter = isset($data['newsletter']) ? filter_var($data['newsletter'], FILTER_VALIDATE_BOOLEAN) : false;

// Handle shopping_for (array)
$shopping_for = isset($data['shopping_for']) && is_array($data['shopping_for']) 
    ? array_map('filter_var', $data['shopping_for'], array_fill(0, count($data['shopping_for']), FILTER_SANITIZE_STRING))
    : [];
$shopping_for_text = !empty($shopping_for) ? implode(', ', $shopping_for) : 'Not specified';

// ==========================================================================
// VALIDATE EMAIL
// ==========================================================================
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// ==========================================================================
// SEND EMAIL USING PHPMailer
// ==========================================================================
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to SMTP::DEBUG_SERVER for debugging
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '011a587122008d';
    $mail->Password   = '65b15e1a2f0e29';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 2525;

    // Recipients - Admin
    $mail->setFrom($smtp_user, $company_name);
    $mail->addAddress($admin_email, $admin_name);
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Consultation Request from ' . $name;

    // Build email body
    $mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: "Segoe UI", Arial, sans-serif;
                line-height: 1.6;
                color: #2c3e50;
                background: #f8f9fa;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background: #ffffff;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            }
            .header {
                background: linear-gradient(135deg, #d62828, #e63946);
                padding: 30px;
                text-align: center;
                color: white;
            }
            .header h1 {
                margin: 0;
                font-size: 24px;
            }
            .header p {
                margin: 10px 0 0;
                opacity: 0.9;
            }
            .content {
                padding: 30px;
            }
            .section {
                margin-bottom: 25px;
                border-bottom: 1px solid #e9ecef;
                padding-bottom: 20px;
            }
            .section-title {
                font-size: 18px;
                font-weight: 700;
                color: #d62828;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .section-title span {
                font-size: 20px;
            }
            .field {
                margin-bottom: 12px;
                display: flex;
            }
            .field-label {
                font-weight: 600;
                width: 140px;
                color: #6c757d;
            }
            .field-value {
                flex: 1;
                color: #2c3e50;
            }
            .badge {
                display: inline-block;
                padding: 4px 12px;
                background: #e9ecef;
                border-radius: 20px;
                font-size: 12px;
                margin-right: 8px;
                margin-bottom: 8px;
            }
            .footer {
                background: #f8f9fa;
                padding: 20px;
                text-align: center;
                color: #6c757d;
                font-size: 12px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background: linear-gradient(135deg, #d62828, #e63946);
                color: white;
                text-decoration: none;
                border-radius: 50px;
                margin-top: 10px;
            }
            .highlight {
                background: #f8f9fa;
                padding: 15px;
                border-radius: 12px;
                margin: 15px 0;
                border-left: 4px solid #d62828;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>New Consultation Request</h1>
                <p>' . date('F j, Y g:i A') . '</p>
            </div>
            <div class="content">
                <div class="section">
                    <div class="section-title">
                        Client Information
                    </div>
                    <div class="field">
                        <div class="field-label">Full Name:</div>
                        <div class="field-value"><strong>' . htmlspecialchars($name) . '</strong></div>
                    </div>
                    <div class="field">
                        <div class="field-label">Role/Type:</div>
                        <div class="field-value">' . htmlspecialchars($role) . '</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Email:</div>
                        <div class="field-value"><a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></div>
                    </div>
                    <div class="field">
                        <div class="field-label">Phone:</div>
                        <div class="field-value"><a href="tel:' . htmlspecialchars($phone) . '">' . htmlspecialchars($phone) . '</a></div>
                    </div>
                </div>
                
                <div class="section">
                    <div class="section-title">
                        Project Details
                    </div>
                    <div class="field">
                        <div class="field-label">Shopping For:</div>
                        <div class="field-value">' . htmlspecialchars($shopping_for_text) . '</div>
                    </div>
                    ' . ($project_description ? '
                    <div class="field">
                        <div class="field-label">Description:</div>
                        <div class="field-value">' . nl2br(htmlspecialchars($project_description)) . '</div>
                    </div>
                    ' : '') . '
                </div>
                
                <div class="section">
                    <div class="section-title">
                        Marketing
                    </div>
                    <div class="field">
                        <div class="field-label">How Found Us:</div>
                        <div class="field-value">' . ($how_found ? htmlspecialchars($how_found) : 'Not specified') . '</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Newsletter:</div>
                        <div class="field-value">' . ($newsletter ? 'Yes, subscribe' : 'No, thanks') . '</div>
                    </div>
                </div>
                
                <div class="highlight">
                    <strong>Next Steps:</strong><br>
                    A member of our team will contact you within 24 hours to discuss your project and provide personalized recommendations.
                </div>
            </div>
            <div class="footer">
                <p>' . $company_name . '<br>' . $company_address . '<br>Phone: ' . $company_phone . '</p>
                <p>' . date('Y') . ' ' . $company_name . '. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ';

    // Plain text version
    $mail->AltBody = "New Consultation Request\n\n"
        . "Name: $name\n"
        . "Role: $role\n"
        . "Email: $email\n"
        . "Phone: $phone\n"
        . "Shopping For: $shopping_for_text\n"
        . "Project Description: $project_description\n"
        . "How Found Us: $how_found\n"
        . "Newsletter: " . ($newsletter ? "Yes" : "No") . "\n\n"
        . "Next Steps: A member of our team will contact you within 24 hours.\n"
        . "---\n"
        . $company_name . " | " . $company_address . " | " . $company_phone;

    $mail->send();

    // ==========================================================================
    // SEND AUTO-REPLY TO USER
    // ==========================================================================
    $autoReply = new PHPMailer(true);
    $autoReply->SMTPDebug = SMTP::DEBUG_OFF;
    $autoReply->isSMTP();
    $autoReply->Host       = 'sandbox.smtp.mailtrap.io';
    $autoReply->SMTPAuth   = true;
    $autoReply->Username   = '011a587122008d';
    $autoReply->Password   = '65b15e1a2f0e29';
    $autoReply->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $autoReply->Port       = 2525;

    $autoReply->setFrom($admin_email, $company_name);
    $autoReply->addAddress($email, $name);
    $autoReply->isHTML(true);
    $autoReply->Subject = 'Thank You for Your Consultation Request - ' . $company_name;

    $autoReply->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: "Segoe UI", Arial, sans-serif;
                line-height: 1.6;
                color: #2c3e50;
                background: #f8f9fa;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background: #ffffff;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            }
            .header {
                background: linear-gradient(135deg, #d62828, #e63946);
                padding: 30px;
                text-align: center;
                color: white;
            }
            .header h1 {
                margin: 0;
                font-size: 24px;
            }
            .content {
                padding: 30px;
            }
            .message {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 12px;
                margin: 20px 0;
                border-left: 4px solid #d62828;
            }
            .footer {
                background: #f8f9fa;
                padding: 20px;
                text-align: center;
                color: #6c757d;
                font-size: 12px;
            }
            .button {
                display: inline-block;
                padding: 12px 24px;
                background: linear-gradient(135deg, #d62828, #e63946);
                color: white;
                text-decoration: none;
                border-radius: 50px;
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Thank You, ' . htmlspecialchars($name) . '!</h1>
                <p>Your consultation request has been received</p>
            </div>
            <div class="content">
                <p>Dear ' . htmlspecialchars($name) . ',</p>
                <p>Thank you for reaching out to <strong>' . $company_name . '</strong>. We\'ve received your consultation request and will get back to you within 24 hours.</p>
                
                <div class="message">
                    <strong>Here\'s what you requested:</strong><br><br>
                    <strong>Project Type:</strong> ' . htmlspecialchars($role) . '<br>
                    <strong>Shopping For:</strong> ' . htmlspecialchars($shopping_for_text) . '<br>
                    ' . ($project_description ? '<strong>Project Details:</strong><br>' . nl2br(htmlspecialchars($project_description)) . '<br><br>' : '') . '
                    <strong>Next Steps:</strong> Our team will contact you to schedule your free consultation and discuss your project in detail.
                </div>
                
                <p>In the meantime, you can:</p>
                <ul>
                    <li>Call us at <strong>' . $company_phone . '</strong></li>
                    <li>Visit our showroom at:<br>' . $company_address . '</li>
                    <li>Reply to this email with any questions</li>
                </ul>
                
                <div style="text-align: center;">
                    <a href="#" class="button">View Our Collections</a>
                </div>
                
                <p>We look forward to helping you create your dream space with our premium sintered stone surfaces.</p>
                
                <p>Best regards,<br>
                <strong>The ' . $company_name . ' Team</strong></p>
            </div>
            <div class="footer">
                <p>' . $company_name . '<br>' . $company_address . '<br>Phone: ' . $company_phone . '</p>
                <p>' . date('Y') . ' ' . $company_name . '. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ';

    $autoReply->AltBody = "Dear $name,\n\n"
        . "Thank you for contacting " . $company_name . ". We've received your consultation request and will get back to you within 24 hours.\n\n"
        . "Your Request:\n"
        . "- Project Type: $role\n"
        . "- Shopping For: $shopping_for_text\n"
        . ($project_description ? "- Project Details: $project_description\n\n" : "\n")
        . "Next Steps: Our team will contact you to schedule your free consultation.\n\n"
        . "In the meantime, you can call us at $company_phone or visit our showroom at $company_address.\n\n"
        . "Best regards,\n"
        . "The " . $company_name . " Team";

    $autoReply->send();

    // ==========================================================================
    // SEND SUCCESS RESPONSE
    // ==========================================================================
    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your consultation request has been submitted. We will contact you within 24 hours.'
    ]);

} catch (Exception $e) {
    // Log error for debugging
    error_log("Mailer Error: " . $mail->ErrorInfo);
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Sorry, there was an error submitting your request. Please try again or call us directly.'
    ]);
}

// End output buffering
ob_end_flush();
?>