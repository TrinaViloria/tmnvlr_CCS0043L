<?php

$message = "";
$result = [];

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

    } else {

        $message = "Registration Successful!";

        $result = [
            "First Name" => $firstname,
            "Middle Name" => $middlename,
            "Last Name" => $lastname,
            "Username" => $username,
            "Birthday" => $birthday,
            "Email" => $email,
            "Contact Number" => $contact
        ];

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

            <input type="text" name="firstname" placeholder="First Name" required>

            <input type="text" name="middlename" placeholder="Middle Name">

            <input type="text" name="lastname" placeholder="Last Name" required>

            <input type="text" name="username" placeholder="Username" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="password" name="confirm" placeholder="Confirm Password" required>

            <input type="date" name="birthday" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="text" name="contact" placeholder="Contact Number" required>

            <input type="submit" name="register" value="Register">

        </form>

        <?php if ($message != "") { ?>

            <div class="message">

                <?php echo e($message); ?>

            </div>

        <?php } ?>

        <?php if (!empty($result)) { ?>

            <h3>Registration Result</h3>

            <table border="1" cellpadding="10" cellspacing="0" width="100%">

                <?php foreach ($result as $label => $value) { ?>

                    <tr>

                        <th><?php echo e($label); ?></th>

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