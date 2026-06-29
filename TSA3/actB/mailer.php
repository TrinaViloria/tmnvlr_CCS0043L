<?php
$phpmailer_path=__DIR__."/phpmailer/src";

if(file_exists($phpmailer_path."/PHPMailer.php")){
    require_once($phpmailer_path."/PHPMailer.php");
    require_once($phpmailer_path."/SMTP.php");
    require_once($phpmailer_path."/Exception.php");
}else{
    require_once(__DIR__."/PHPMailer.php");
    require_once(__DIR__."/SMTP.php");
    require_once(__DIR__."/Exception.php");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_confirmation_email($to_email, $to_name, $token) {
    $mail = new PHPMailer(true);

    try {
        $safe_name=htmlspecialchars($to_name,ENT_QUOTES,"UTF-8");

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "trinamarielle30@gmail.com";
        $mail->Password = "tknxpfzgqcsyqgow";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($mail->Username, "Registration Confirmation");
        $mail->addAddress($to_email, $to_name);

        $confirm_link = "http://localhost/tmnvlr/tmnvlr_CCS0043L/tsa3/actB/confirm.php?token=" . urlencode($token);
        $safe_link=htmlspecialchars($confirm_link,ENT_QUOTES,"UTF-8");

        $mail->isHTML(true);
        $mail->Subject = "Confirm your registration";
        $mail->Body = "
            <p>Dear <strong>$safe_name</strong>,</p>
            <p>Thank you for registering. Click the link below to confirm your registration:</p>
            <p>
                <a href='$safe_link' style='padding: 10px 20px; background: #198754; color: white; text-decoration: none; border-radius: 4px;'>
                    Confirm Account
                </a>
            </p>
            <p>If the button does not work, copy-paste this link into your browser:</p>
            <p><a href='$safe_link'>$safe_link</a></p>
            <p>Trina Marielle Viloria</p>
        ";
        $mail->AltBody = "Dear ".$to_name.",\n\nConfirm your account here:\n".$confirm_link;

        $mail->send();
    } catch (Exception $e) {
        throw new Exception("Confirmation email could not be sent. Error: {$mail->ErrorInfo}");
    }
}

function send_password_reset_email($to_email, $to_name, $token) {
    $mail = new PHPMailer(true);

    try {
        $safe_name=htmlspecialchars($to_name,ENT_QUOTES,"UTF-8");

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "trinamarielle30@gmail.com";
        $mail->Password = "tknxpfzgqcsyqgow";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($mail->Username, "Password Reset");
        $mail->addAddress($to_email, $to_name);

        $reset_link = "http://localhost/tmnvlr/tmnvlr_CCS0043L/tsa3/actB/resetpassword.php?token=" . urlencode($token);
        $safe_link=htmlspecialchars($reset_link,ENT_QUOTES,"UTF-8");
        

        $mail->isHTML(true);
        $mail->Subject = "Reset your password";
        $mail->Body = "
            <p>Dear <strong>$safe_name</strong>,</p>
            <p>Click the link below to reset your password. This link will expire in 1 hour.</p>
            <p>
                <a href='$safe_link' style='padding: 10px 20px; background: #0d6efd; color: white; text-decoration: none; border-radius: 4px;'>
                    Reset Password
                </a>
            </p>
            <p>If the button does not work, copy-paste this link into your browser:</p>
            <p><a href='$safe_link'>$safe_link</a></p>
            <p>If you did not request this, you can ignore this email.</p>
        ";
        $mail->AltBody = "Dear ".$to_name.",\n\nReset your password here:\n".$reset_link."\n\nThis link will expire in 1 hour.";

        $mail->send();
    } catch (Exception $e) {
        throw new Exception("Password reset email could not be sent. Error: {$mail->ErrorInfo}");
    }
}
?>
