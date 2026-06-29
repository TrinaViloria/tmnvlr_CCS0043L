<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
}

include("db.php");
require_once("mailer.php");

$message = "";
$success = false;
$registeredUser = [];

function e($value)
{
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}

if (isset($_POST['register'])) {

    $firstname = trim($_POST['firstname']);
    $middlename = trim($_POST['middlename']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $birthday = $_POST['birthday'];
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);

    if ($password != $confirm) {

        $message = "Password and Confirm Password are not the same.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";

    } else {

        $check = mysqli_prepare($conn, "SELECT id FROM users WHERE username=? OR email=? LIMIT 1");
        mysqli_stmt_bind_param($check, "ss", $username, $email);
        mysqli_stmt_execute($check);
        $result = mysqli_stmt_get_result($check);

        if (mysqli_num_rows($result) > 0) {

            $message = "Username or Email already exists.";

        } else {

            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $token = bin2hex(random_bytes(32));
            $token_expires_at = date("Y-m-d H:i:s", strtotime("+1 day"));
            $email_verified = 0;

            $stmt = mysqli_prepare($conn, "INSERT INTO users(firstname,middlename,lastname,username,password,birthday,email,contact,email_verified,confirmation_token,token_expires_at)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)");

            mysqli_stmt_bind_param(
                $stmt,
                "ssssssssiss",
                $firstname,
                $middlename,
                $lastname,
                $username,
                $hashed,
                $birthday,
                $email,
                $contact,
                $email_verified,
                $token,
                $token_expires_at
            );

            if (mysqli_stmt_execute($stmt)) {

                $registeredUser = array(
                    "First Name" => $firstname,
                    "Middle Name" => $middlename,
                    "Last Name" => $lastname,
                    "Username" => $username,
                    "Birthday" => $birthday,
                    "Email" => $email,
                    "Contact" => $contact
                );

                try {

                    send_confirmation_email($email, $firstname, $token);

                    $success = true;

                    $message = "Registration Successful! Please check your email to confirm your account.";

                } catch (Exception $e) {

                    $success = true;

                    $message = "Registration saved, but confirmation email could not be sent.";

                }

            } else {

                $message = "Registration Failed.";

            }

        }

    }

}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Registration</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Registration</h2>

        <form method="POST">

            <input type="text" name="firstname" placeholder="First Name"
                value="<?php echo $success ? "" : e($_POST['firstname'] ?? ""); ?>" required>

            <input type="text" name="middlename" placeholder="Middle Name"
                value="<?php echo $success ? "" : e($_POST['middlename'] ?? ""); ?>">

            <input type="text" name="lastname" placeholder="Last Name"
                value="<?php echo $success ? "" : e($_POST['lastname'] ?? ""); ?>" required>

            <input type="text" name="username" placeholder="Username"
                value="<?php echo $success ? "" : e($_POST['username'] ?? ""); ?>" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="password" name="confirm" placeholder="Confirm Password" required>

            <input type="date" name="birthday" value="<?php echo $success ? "" : e($_POST['birthday'] ?? ""); ?>"
                required>

            <input type="email" name="email" placeholder="Email"
                value="<?php echo $success ? "" : e($_POST['email'] ?? ""); ?>" required>

            <input type="text" name="contact" placeholder="Contact Number"
                value="<?php echo $success ? "" : e($_POST['contact'] ?? ""); ?>" required>

            <input type="submit" name="register" value="Register">

        </form>

        <?php if ($message != "") { ?>

            <div class="message">
                <?php echo e($message); ?>
            </div>

        <?php } ?>

        <?php if ($success) { ?>

            <h3>Registration Details</h3>

            <table border="1" cellpadding="8" cellspacing="0" width="100%">

                <?php foreach ($registeredUser as $key => $value) { ?>

                    <tr>
                        <th><?php echo e($key); ?></th>
                        <td><?php echo e($value); ?></td>
                    </tr>

                <?php } ?>

            </table>

        <?php } ?>

        <div class="actions">

            <p><a href="login.php">Login Here</a></p>

        </div>

    </div>

</body>

</html>