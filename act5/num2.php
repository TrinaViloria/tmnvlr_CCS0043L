<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    setcookie("firstname", $_POST["firstname"], time() + 10);
    setcookie("middlename", $_POST["middlename"], time() + 20);
    setcookie("lastname", $_POST["lastname"], time() + 30);
 
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Personal Information</title>
 
    <style>
        html, body {
            margin: 0;
            min-height: 100%;
            font-family: Georgia, "Times New Roman", serif;
            background: linear-gradient(135deg, #fff0f6 0%, #ffe6f2 100%);
            color: #3b122b;
        }

        body {
            display: flex;
            justify-content: center;
            padding: 40px 16px;
        }

        .container {
            width: min(100%, 460px);
            padding: 24px;
            border-radius: 14px;
            background: rgba(255, 247, 251, 0.96);
            border: 1px solid #f4d7e8;
            box-shadow: 0 18px 40px rgba(216, 29, 138, 0.12);
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #f2cfe0;
            border-radius: 8px;
            background: #fff9fb;
            color: inherit;
        }

        button {
            width: 100%;
            padding: 11px;
            border: none;
            background: #e83e8c;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        h2, h3 {
            text-align: center;
            color: #8b1f4a;
        }

        hr {
            border: 0;
            border-top: 1px solid #fde8f2;
            margin: 18px 0;
        }
    </style>
</head>
<body>
 
<div class="container">
    <h2>Personal Information</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
        First Name:
        <input type="text" name="firstname" required>
 
        Middle Name:
        <input type="text" name="middlename" required>
 
        Last Name:
        <input type="text" name="lastname" required>
 
        <button type="submit">Submit</button>
    </form>
 
    <hr>
    <h3>Summary</h3>
    <p><b>First Name:</b>
        <?php echo $_COOKIE["firstname"] ?? "First Name Expired"; ?>
    </p>
 
    <p><b>Middle Name:</b>
        <?php echo $_COOKIE["middlename"] ?? "Middle Name Expired"; ?>
    </p>
 
    <p><b>Last Name:</b>
        <?php echo $_COOKIE["lastname"] ?? "Last Name Expired"; ?>
    </p>
</div>
</body>
</html>
