<?php

include("db.php");
require_once("mailer.php");

$message = "";

function e($value)
{
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}

if (isset($_POST['send_reset'])) {

    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";

    } else {

        $stmt = mysqli_prepare($conn, "SELECT id,firstname,email,email_verified FROM users WHERE email=? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {

            $message = "Email address was not found.";

        } else {

            $row = mysqli_fetch_assoc($result);

            if (isset($row['email_verified']) && (int) $row['email_verified'] !== 1) {

                $message = "Please confirm your email before resetting your password.";

            } else {

                $token = bin2hex(random_bytes(32));
                $token_expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

                $update = mysqli_prepare($conn, "UPDATE users SET reset_token=?, reset_token_expires_at=? WHERE id=?");
                mysqli_stmt_bind_param($update, "ssi", $token, $token_expires_at, $row['id']);

                if (mysqli_stmt_execute($update)) {

                    try {

                        send_password_reset_email($row['email'], $row['firstname'], $token);
                        $message = "Password reset link sent. Please check your email.";

                    } catch (Exception $e) {

                        $message = "Reset token was saved, but the email could not be sent. " . $e->getMessage();

                    }

                } else {

                    $message = "Could not create password reset token. Please try again.";

                }

            }

        }

    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Forgot Password</title>
</head>

<body>

    <div class="container">

        <h2>Forgot Password</h2>

        <form method="POST">

            <input type="email" name="email" placeholder="Email" value="<?php echo e($_POST['email'] ?? ""); ?>"
                required>

            <input type="submit" name="send_reset" value="Send Reset Link">

        </form>

        <?php if ($message != "") { ?>

            <div class="message"><?php echo e($message); ?></div>

        <?php } ?>

        <div class="actions">

            <p><a href="login.php">Back to Login</a></p>

        </div>

    </div>

</body>

</html>