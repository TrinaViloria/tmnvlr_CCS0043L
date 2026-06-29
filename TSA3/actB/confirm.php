<?php

include("db.php");

$message="";

function e($value){
    return htmlspecialchars($value ?? "",ENT_QUOTES,"UTF-8");
}

if(!isset($_GET['token']) || trim($_GET['token'])===""){

    $message="Invalid confirmation link.";

}else{

    $token=trim($_GET['token']);

    $stmt=mysqli_prepare($conn,"SELECT id,token_expires_at,email_verified FROM users WHERE confirmation_token=? LIMIT 1");
    mysqli_stmt_bind_param($stmt,"s",$token);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)===0){

        $message="Confirmation link is invalid or already used.";

    }else{

        $row=mysqli_fetch_assoc($result);

        if((int)$row['email_verified']===1){

            $message="Your account is already confirmed.";

        }elseif(strtotime($row['token_expires_at'])<time()){

            $message="Confirmation link has expired. Please register again or request a new link.";

        }else{

            $update=mysqli_prepare($conn,"UPDATE users SET email_verified=1, confirmation_token=NULL, token_expires_at=NULL WHERE id=?");
            mysqli_stmt_bind_param($update,"i",$row['id']);

            if(mysqli_stmt_execute($update)){

                $message="Account confirmed successfully. You can now log in.";

            }else{

                $message="Account confirmation failed. Please try again.";

            }

        }

    }

}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Confirm Account</title>
</head>

<body>

<div class="container">

<h2>Confirm Account</h2>

<?php if($message!=""){ ?>

<div class="message"><?php echo e($message); ?></div>

<?php } ?>

<div class="actions">

<p><a href="login.php">Login Here</a></p>

</div>

</div>

</body>
</html>
