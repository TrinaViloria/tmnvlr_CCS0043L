<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration Form</title>
<style>

    body {
        font-family: Arial;
        background: #f0f0f0;
    }

    .container {
        width: 850px;
        margin: 30px auto;
        background: white;
        border: 3px solid #333;
        padding: 20px;
    }

    .title {
        text-align: center;
        font-size: 26px;
        font-weight: bold;
        border-bottom: 2px solid black;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .section {
        margin-bottom: 15px;
    }

    .section-title {
        font-weight: bold;
        background: #333;
        color: white;
        padding: 6px;
        font-size: 14px;
    }

    .row {
        display: grid;
        grid-template-columns: 200px 1fr;
        padding: 6px 0;
        border-bottom: 1px dashed #999;
    }

    .label {
        font-weight: bold;
    }

    .value {
        padding-left: 10px;
    }

    .output {
        margin-top: 20px;
        border: 2px solid black;
        padding: 10px;
        background: #fafafa;
    }

    .output-title {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }
</style>

<?php

$studentNumber = 202410441;
$date = '05/11/26';
$grade = '2nd Year';
$expelled = false;
$firstName = 'Trina Marielle';
$lastName = 'Viloria';
$gender = 'Female';
$birthDate = '11/09/05';
$school = 'FEU Diliman';
$reason = 'Course-related';
$conditions = 'None';
$epiPen = false;
$country = 'Philippines';
$citizenship = 'Filipino';
?>

</head>

<body>

<div class="container">

<div class="title">STUDENT REGISTRATION FORM</div>

<div class="section">

    <div class="section-title">School Information</div>

    <div class="row">
        <div class="label">ID Number</div>
        <div class="value"><?php echo $studentNumber; ?></div>
    </div>

    <div class="row">
        <div class="label">Registration Date</div>
        <div class="value"><?php echo $date; ?></div>
    </div>

    <div class="row">
        <div class="label">Year Level</div>
        <div class="value"><?php echo $grade; ?></div>
    </div>
</div>

<div class="section">

    <div class="section-title">Status</div>
    <div class="row">
        <div class="label">Expelled</div>
        <div class="value"><?php 
        if ($expelled == true) {
            echo "Yes";
        } else {
            echo "No";
        }
        ?></div>
    </div>
</div>

<div class="section">

    <div class="section-title">Student Background</div>
    <div class="row">
        <div class="label">First Name</div>
        <div class="value"><?php echo $firstName; ?></div>
    </div>

    <div class="row">
        <div class="label">Last Name</div>
        <div class="value"><?php echo $lastName; ?></div>
    </div>

    <div class="row">
        <div class="label">Gender</div>
        <div class="value"><?php echo $gender; ?></div>
    </div>

    <div class="row">
        <div class="label">Date of Birth</div>
        <div class="value"><?php echo $birthDate; ?></div>
    </div>
</div>

<div class="section">

    <div class="section-title">Educational History</div>
    <div class="row">
        <div class="label">Last School Attended</div>
        <div class="value"><?php echo $school; ?></div>
    </div>

    <div class="row">
        <div class="label">Reason for Transfer</div>
        <div class="value"><?php echo $reason; ?></div>
    </div>
</div>

<div class="section">

    <div class="section-title">Medical Information</div>
    <div class="row">
        <div class="label">Medical Conditions</div>
        <div class="value"><?php echo $conditions; ?></div>
    </div>

    <div class="row">
        <div class="label">EpiPen Required</div>
        <div class="value"><?php 
        if ($epiPen == true) {
            echo "Yes";
        } else {
            echo "No";
        }
        ?></div>
    </div>
</div>

<div class="section">
    
    <div class="section-title">Citizenship Information</div>
    <div class="row">
        <div class="label">Country of Birth</div>
        <div class="value"><?php echo $country; ?></div>
    </div>
    
    <div class="row">
        <div class="label">Citizenship</div>
        <div class="value"><?php echo $citizenship; ?></div>
    </div>
</div>

</div>

</body>
</html>