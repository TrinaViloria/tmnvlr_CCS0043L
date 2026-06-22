<?php
include("db.php");

$message = "";

if(isset($_POST['save']))
{
    $d_name = $_POST['d_name'];
    $d_breed = $_POST['d_breed'];
    $d_age = $_POST['d_age'];
    $d_add = $_POST['d_add'];
    $d_color = $_POST['d_color'];
    $d_height = $_POST['d_height'];
    $d_weight = $_POST['d_weight'];

    $sql = "INSERT INTO tbldogs
    (d_name, d_breed, d_age, d_add, d_color, d_height, d_weight)
    VALUES
    ('$d_name','$d_breed','$d_age','$d_add','$d_color','$d_height','$d_weight')";

    if($conn->query($sql))
    {
        $message = "Dog Information Saved Successfully!";
    }
    else
    {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dog Registration</title>

<style>

:root{
    --bg: #fff1f6;
    --panel: rgba(255,255,255,0.95);
    --panel-border: rgba(190, 52, 108, 0.14);
    --text: #4a1f34;
    --muted: #8a5c72;
    --accent: #e83e8c;
    --accent-dark: #bf216f;
    --accent-soft: #fde1ec;
    --shadow: 0 24px 60px rgba(132, 32, 74, 0.16);
}

body{
    margin: 0;
    min-height: 100vh;
    font-family: "Segoe UI", "Trebuchet MS", sans-serif;
    color: var(--text);
    background:
    linear-gradient(rgba(255, 248, 251, 0.78), rgba(255, 241, 246, 0.82)),
    url("https://i.pinimg.com/736x/0d/5b/ad/0d5bad722948b604eaca32f131cde734.jpg") center/cover no-repeat fixed;
}

.container{
    width: min(520px, calc(100% - 24px));
    margin: 16px auto;
    background: var(--panel);
    border: 1px solid var(--panel-border);
    border-radius: 22px;
    padding: 20px;
    box-shadow: var(--shadow);
    backdrop-filter: blur(10px);
}

h2{
    margin: 0 0 6px;
    font-size: clamp(1.35rem, 2.6vw, 2rem);
    letter-spacing: -0.03em;
    text-align:center;
}

.subtitle{
    margin: 0 0 14px;
    text-align: center;
    color: var(--muted);
    line-height: 1.45;
    font-size: 0.95rem;
}

.header-badge{
    width: fit-content;
    margin: 0 auto 12px;
    padding: 6px 12px;
    border-radius: 999px;
    background: var(--accent-soft);
    color: var(--accent-dark);
    font-size: 0.78rem;
    font-weight: 800;
    letter-spacing: 0.03em;
}

label{
    font-weight: 700;
    font-size: 0.88rem;
    display:block;
    margin-bottom: 6px;
    color: var(--text);
}

input{
    width:100%;
    box-sizing: border-box;
    padding: 10px 12px;
    border: 1px solid #efbfd2;
    border-radius: 12px;
    background: #fff;
    color: var(--text);
    transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
    outline: none;
}

input:focus{
    border-color: rgba(232, 62, 140, 0.8);
    box-shadow: 0 0 0 4px rgba(232, 62, 140, 0.14);
}

.grid{
    display:grid;
    grid-template-columns: 1fr;
    gap: 12px;
    margin-top: 10px;
}

.field{
    display:flex;
    flex-direction:column;
    gap: 4px;
}

.field + .field{
    margin-top: 0;
}

button{
    width:100%;
    padding: 11px 14px;
    background: linear-gradient(135deg, var(--accent), var(--accent-dark));
    color:white;
    border:none;
    border-radius: 12px;
    cursor:pointer;
    font-weight: 700;
    letter-spacing: 0.04em;
    box-shadow: 0 14px 26px rgba(232, 62, 140, 0.26);
    transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
}

button:hover{
    transform: translateY(-1px);
    filter: brightness(1.03);
    box-shadow: 0 16px 30px rgba(232, 62, 140, 0.3);
}

.message{
    margin: 4px 0 12px;
    min-height: 20px;
    color: var(--accent-dark);
    text-align:center;
    font-weight: 700;
    font-size: 0.9rem;
}

.link{
    text-align:center;
    margin-top: 14px;
}

.link a{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap: 8px;
    padding: 9px 14px;
    border-radius: 999px;
    text-decoration:none;
    color: var(--accent-dark);
    background: var(--accent-soft);
    border: 1px solid rgba(232, 62, 140, 0.16);
    font-weight: 700;
    font-size: 0.9rem;
}

.actions{
    margin-top: 12px;
}

.input-with-unit {
    display: flex;
    align-items: center;
    gap: 6px;
}

.input-with-unit input {
    flex: 1;
    padding: 6px;
    border: 1px solid var(--panel-border);
    border-radius: 6px;
}

.unit {
    font-size: 0.9rem;
    color: var(--muted);
    font-weight: 600;
}


@media (max-width: 720px){
    .container{
        width: calc(100% - 16px);
        padding: 16px;
        margin: 8px auto;
        border-radius: 18px;
    }
}

</style>

</head>

<body>

<div class="container">

<h2>Dog Registration Form</h2>

<p class="message"><?php echo $message; ?></p>

<form method="POST">

<div class="grid">
    <div class="field">
        <label>Dog Name</label>
        <input type="text" name="d_name" required>
    </div>

    <div class="field">
        <label>Breed</label>
        <input type="text" name="d_breed" required>
    </div>

    <div class="field">
        <label>Age</label>
        <input type="number" name="d_age" required>
    </div>

    <div class="field">
        <label>Address</label>
        <input type="text" name="d_add" required>
    </div>

    <div class="field">
        <label>Color</label>
        <input type="text" name="d_color" required>
    </div>

    <div class="field">
        <label>Height</label>
        <div class="input-with-unit">
            <input type="number" step="0.01" name="d_height" required>
            <span class="unit">in</span>
        </div>
    </div>

    <div class="field">
        <label>Weight</label>
        <div class="input-with-unit">
            <input type="number" step="0.01" name="d_weight" required>
            <span class="unit">kg</span>
        </div>
    </div>

</div>

<div class="actions">
    <button type="submit" name="save">
        Save Dog Information
    </button>
</div>

</form>

<div class="link">
    <a href="DogView.php">View Dog Records</a>
</div>

</div>

</body>
</html>