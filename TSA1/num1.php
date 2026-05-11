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
$student = [
    'student_number' => 202410441,
    'date' => '2026-05-11',
    'grade' => '2nd Year',
    'expelled' => false,
    'first_name' => 'Trina Marielle',
    'last_name' => 'Viloria',
    'gender' => 'Female',
    'birth_date' => '2005-11-09',
    'school' => 'FEU Institute of Technology',
    'reason' => 'Course-related',
    'conditions' => 'None',
    'epi_pen' => false,
    'country' => 'Philippines',
    'citizenship' => 'Filipino',
];

?>

</head>

<body>

<div class="container">

<div class="title">STUDENT REGISTRATION FORM</div>

<div class="section">
<div class="section-title">School Use</div>
<div class="row"><div class="label">Student Number</div><div class="value"><?php echo $student['student_number']; ?></div></div>
<div class="row"><div class="label">Date</div><div class="value"><?php echo date('F j, Y', strtotime($student['date'])); ?></div></div>
<div class="row"><div class="label">Grade</div><div class="value"><?php echo $student['grade']; ?></div></div>
</div>

<div class="section">
<div class="section-title">Status</div>
<div class="row"><div class="label">Expelled</div><div class="value"><?php echo $student['expelled'] ? 'Yes' : 'No'; ?></div></div>
</div>

<div class="section">
<div class="section-title">Student Information</div>
<div class="row"><div class="label">First Name</div><div class="value"><?php echo $student['first_name']; ?></div></div>
<div class="row"><div class="label">Last Name</div><div class="value"><?php echo $student['last_name']; ?></div></div>
<div class="row"><div class="label">Gender</div><div class="value"><?php echo $student['gender']; ?></div></div>
<div class="row"><div class="label">Date of Birth</div><div class="value"><?php echo date('F j, Y', strtotime($student['birth_date'])); ?></div></div>
</div>

<div class="section">
<div class="section-title">Previous School</div>
<div class="row"><div class="label">School</div><div class="value"><?php echo $student['school']; ?></div></div>
<div class="row"><div class="label">Reason</div><div class="value"><?php echo $student['reason']; ?></div></div>
</div>

<div class="section">
<div class="section-title">Health Information</div>
<div class="row"><div class="label">Medical Conditions</div><div class="value"><?php echo $student['conditions']; ?></div></div>
<div class="row"><div class="label">Epi-pen</div><div class="value"><?php echo $student['epi_pen'] ? 'Yes' : 'No'; ?></div></div>
</div>

<div class="section">
<div class="section-title">Citizenship</div>
<div class="row"><div class="label">Birth Country</div><div class="value"><?php echo $student['country']; ?></div></div>
<div class="row"><div class="label">Citizenship</div><div class="value"><?php echo $student['citizenship']; ?></div></div>
</div>

<?php
$fullName = $student['first_name'] . ' ' . $student['last_name'];

echo "<div class='output'>";
echo "<div class='output-title'>REGISTERED STUDENT</div>";
echo "<div class='row'><div class='label'>Name</div><div class='value'>$fullName</div></div>";
echo "<div class='row'><div class='label'>Student Number</div><div class='value'>" . $student['student_number'] . "</div></div>";
echo "<div class='row'><div class='label'>Grade</div><div class='value'>" . $student['grade'] . "</div></div>";
echo "<div class='row'><div class='label'>Country</div><div class='value'>" . $student['country'] . "</div></div>";
echo "</div>";
?>

</div>

</body>
</html>