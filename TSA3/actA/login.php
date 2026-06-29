<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
}

$message = "";

static $correctUsername = "trinamarielle";
static $correctPassword = "hello123";

$cookie_username = $_COOKIE['username'] ?? "";
$cookie_password = $_COOKIE['password'] ?? "";

function e($value)
{
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == $correctUsername && $password == $correctPassword) {

        $_SESSION['user'] = $username;

        if (isset($_POST['remember'])) {

            setcookie("username", $username, time() + 86400 * 30, "/");
            setcookie("password", $password, time() + 86400 * 30, "/");

        } else {

            setcookie("username", "", time() - 3600, "/");
            setcookie("password", "", time() - 3600, "/");

        }

        header("Location: home.php");
        exit();

    } else {

        $message = "Invalid Username or Password.";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Login</h2>

        <form method="POST">

            <input type="text" name="username" placeholder="Username" value="<?php echo e($cookie_username); ?>"
                required>

            <input type="password" name="password" placeholder="Password" value="<?php echo e($cookie_password); ?>"
                required>

            <label>

                <input type="checkbox" name="remember" <?php
                if ($cookie_username != "") {
                    echo "checked";
                }
                ?>>

                Remember Me

            </label>

            <input type="submit" name="login" value="Login">

        </form>

        <?php if ($message != "") { ?>

            <div class="message">

                <?php echo e($message); ?>

            </div>

        <?php } ?>

        <div class="actions">

            <p><a href="registration.php">Register Here</a></p>

        </div>

    </div>

</body>

</html>