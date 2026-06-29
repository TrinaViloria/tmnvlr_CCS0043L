<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include("db.php");

function e($value)
{
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}

$user = $_SESSION['user'];

$stmt = mysqli_prepare($conn, "SELECT firstname,middlename,lastname,username,birthday,email,contact FROM users WHERE username=?");
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

    <title>Home</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Welcome <?php echo e($row['firstname']); ?></h2>

        <table border="1" cellpadding="10" cellspacing="0" width="100%">

            <tr>
                <th>First Name</th>
                <td><?php echo e($row['firstname']); ?></td>
            </tr>

            <tr>
                <th>Middle Name</th>
                <td><?php echo e($row['middlename']); ?></td>
            </tr>

            <tr>
                <th>Last Name</th>
                <td><?php echo e($row['lastname']); ?></td>
            </tr>

            <tr>
                <th>Username</th>
                <td><?php echo e($row['username']); ?></td>
            </tr>

            <tr>
                <th>Birthday</th>
                <td><?php echo e($row['birthday']); ?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?php echo e($row['email']); ?></td>
            </tr>

            <tr>
                <th>Contact Number</th>
                <td><?php echo e($row['contact']); ?></td>
            </tr>

        </table>

        <div class="actions">

            <p><a href="resetpassword.php">Reset Password</a></p>

            <p><a href="logout.php">Logout</a></p>

        </div>

    </div>

</body>

</html>