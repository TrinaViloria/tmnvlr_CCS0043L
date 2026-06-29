<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>

<head>

    <title>Home</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Welcome!</h2>

        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>

        <div class="actions">

            <p><a href="logout.php">Logout</a></p>

        </div>

    </div>

</body>

</html>