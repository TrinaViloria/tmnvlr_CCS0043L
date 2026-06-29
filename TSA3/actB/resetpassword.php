<?php

session_start();

include("db.php");
require_once("mailer.php");

$message = "";
$mode = "";

function e($value)
{
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}

$token = trim($_GET['token'] ?? ($_POST['token'] ?? ""));

if ($token != "") {

    $stmt = mysqli_prepare($conn, "SELECT id,reset_token_expires_at FROM users WHERE reset_token=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {

        $mode = "invalid";
        $message = "Invalid or expired reset link.";

    } else {

        $row = mysqli_fetch_assoc($result);

        if (strtotime($row['reset_token_expires_at']) < time()) {

            $mode = "invalid";
            $message = "Reset link has expired.";

        } else {

            $mode = "token";

            if (isset($_POST['reset_token'])) {

                $new = $_POST['new'];
                $confirm = $_POST['confirm'];

                if ($new != $confirm) {

                    $message = "New password and Re-enter new password should be the same.";

                } else {

                    $hashed = password_hash($new, PASSWORD_DEFAULT);

                    $update = mysqli_prepare($conn, "UPDATE users SET password=?,reset_token=NULL,reset_token_expires_at=NULL WHERE id=?");
                    mysqli_stmt_bind_param($update, "si", $hashed, $row['id']);

                    if (mysqli_stmt_execute($update)) {

                        $message = "Password updated successfully.";
                        $mode = "done";

                    } else {

                        $message = "Password update failed.";

                    }

                }

            }

        }

    }

} else {

    if (!isset($_SESSION['user'])) {

        header("Location: login.php");
        exit();

    }

    $mode = "loggedin";

    $user = $_SESSION['user'];

    if (isset($_POST['change_password'])) {

        $current = $_POST['current'];
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];

        $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE username=?");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if (!password_verify($current, $row['password'])) {

            $message = "Current password is not the same with the old password.";

        } elseif ($new != $confirm) {

            $message = "New password and Re-enter new password should be the same.";

        } else {

            $hashed = password_hash($new, PASSWORD_DEFAULT);

            $update = mysqli_prepare($conn, "UPDATE users SET password=? WHERE username=?");
            mysqli_stmt_bind_param($update, "ss", $hashed, $user);

            if (mysqli_stmt_execute($update)) {

                $message = "Password updated successfully.";

            } else {

                $message = "Password update failed.";

            }

        }

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Reset Password</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Reset Password</h2>

        <?php if ($mode == "token") { ?>

            <form method="POST">

                <input type="hidden" name="token" value="<?php echo e($token); ?>">

                <input type="password" name="new" placeholder="New Password" required>

                <input type="password" name="confirm" placeholder="Re-enter New Password" required>

                <input type="submit" name="reset_token" value="Reset Password">

            </form>

        <?php } elseif ($mode == "loggedin") { ?>

            <form method="POST">

                <input type="password" name="current" placeholder="Current Password" required>

                <input type="password" name="new" placeholder="New Password" required>

                <input type="password" name="confirm" placeholder="Re-enter New Password" required>

                <input type="submit" name="change_password" value="Change Password">

            </form>

        <?php }

        ?>


        <?php if ($message != "") { ?>

            <div class="message">

                <?php echo e($message); ?>

            </div>

        <?php } ?>

        <div class="actions">

            <?php if ($mode == "loggedin") { ?>

                <p><a href="home.php">Back to Home</a></p>

                <p><a href="logout.php">Logout</a></p>

            <?php } else { ?>

                <p><a href="login.php">Back to Login</a></p>

            <?php } ?>

        </div>

    </div>

</body>

</html>
