<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Information Form</title>
</head>
    <style>
        
    html, body {
        height: 100%;
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        background: linear-gradient(135deg, #fff0f6 0%, #ffe6f2 100%);
        color: #3b122b;
    }

    .container {
        max-width: 760px;
        margin: 40px auto;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 24px rgba(20,30,60,0.08);
        padding: 28px 32px;
    }

    h2 {
        margin-top: 0;
        color: #8b1f4a;
        font-size: 1.25rem;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px 18px;
        align-items: center;
    }

    label { display:block; font-weight:600; margin-bottom:6px; }

    input[type="text"], input[type="date"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d3d8e0;
        border-radius: 6px;
        background: #fff9fb;
        box-sizing: border-box;
    }

    input[type="submit"] {
        grid-column: 1 / -1;
        justify-self: start;
        background: #e83e8c;
        color: #fff;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
    }

    hr {
        border: none;
        border-top: 1px solid #eef2f8;
        margin: 18px 0;
    }

    @media (max-width: 640px) {
        form { grid-template-columns: 1fr; }
        .container { margin: 18px; padding: 18px; }
    }
    </style>
    
</head>
<body>

<div class="container">

<h2>Personal Information (POST)</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>First Name: <input type="text" name="firstname" required></label>
    <label>Middle Name: <input type="text" name="middlename" required></label>
    <label>Last Name: <input type="text" name="lastname" required></label>
    <label>Date of Birth: <input type="date" name="dob" required></label>
    <label>Address: <input type="text" name="address" required></label>
    <input type="submit" value="Submit (POST)">
</form>

<hr>

<h2>Personal Information (GET)</h2>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>First Name: <input type="text" name="firstname" required></label>
    <label>Middle Name: <input type="text" name="middlename" required></label>
    <label>Last Name: <input type="text" name="lastname" required></label>
    <label>Date of Birth: <input type="date" name="dob" required></label>
    <label>Address: <input type="text" name="address" required></label>
    <input type="submit" value="Submit (GET)">
</form>

<hr>

<h2>Submitted Data</h2>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Using POST:</h3>";
    echo "First Name: " . htmlspecialchars($_POST['firstname']) . "<br>";
    echo "Middle Name: " . htmlspecialchars($_POST['middlename']) . "<br>";
    echo "Last Name: " . htmlspecialchars($_POST['lastname']) . "<br>";
    echo "Date of Birth: " . htmlspecialchars($_POST['dob']) . "<br>";
    echo "Address: " . htmlspecialchars($_POST['address']) . "<br><br>";
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['firstname'])) {
    echo "<h3>Using GET:</h3>";
    echo "First Name: " . htmlspecialchars($_GET['firstname']) . "<br>";
    echo "Middle Name: " . htmlspecialchars($_GET['middlename']) . "<br>";
    echo "Last Name: " . htmlspecialchars($_GET['lastname']) . "<br>";
    echo "Date of Birth: " . htmlspecialchars($_GET['dob']) . "<br>";
    echo "Address: " . htmlspecialchars($_GET['address']) . "<br>";
}
?>

</div>

</body>
</html>
