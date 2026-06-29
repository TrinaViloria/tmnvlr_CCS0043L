<?php
session_start();

if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit();
}

include("db.php");

$message="";

function e($value){
    return htmlspecialchars($value ?? "",ENT_QUOTES,"UTF-8");
}

$cookie_username = $_COOKIE['username'] ?? "";
$cookie_password = $_COOKIE['password'] ?? "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn,"SELECT * FROM users WHERE username=?");
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){

            if((int)$row['email_verified']!=1){

                $message="Please confirm your email before logging in.";

            }else{

                $_SESSION['user']=$row['username'];

                if(isset($_POST['remember'])){

                    setcookie("username",$username,time()+60*60*24*30,"/");
                    setcookie("password",$password,time()+60*60*24*30,"/");

                }else{

                    setcookie("username","",time()-3600,"/");
                    setcookie("password","",time()-3600,"/");

                }

                header("Location: home.php");
                exit();

            }

        }else{

            $message="Incorrect Password.";

        }

    }else{

        $message="Username not found.";

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

<input
type="text"
name="username"
placeholder="Username"
value="<?php echo e($cookie_username); ?>"
required>

<input
type="password"
name="password"
placeholder="Password"
value="<?php echo e($cookie_password); ?>"
required>

<label>

<input
type="checkbox"
name="remember"

<?php
if($cookie_username!=""){
    echo "checked";
}
?>

>

Remember Me

</label>

<input type="submit" name="login" value="Login">

</form>

<?php if($message!=""){ ?>

<div class="message">

<?php echo e($message); ?>

</div>

<?php } ?>

<div class="actions">

<p><a href="forgotpassword.php">Forgot Password?</a></p>

<p><a href="registration.php">Register Here</a></p>

</div>

</div>

</body>
</html>

