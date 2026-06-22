<?php
include("db.php");

$sql = "SELECT * FROM tbldogs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Dog Records</title>

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
    --row-hover: #fff4f8;
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
    width: min(640px, calc(100% - 24px));
    margin: 16px auto;
    background: var(--panel);
    border: 1px solid var(--panel-border);
    padding: 20px;
    border-radius: 22px;
    box-shadow: var(--shadow);
    backdrop-filter: blur(10px);
}

h2{
    margin: 0 0 6px;
    font-size: clamp(1.35rem, 2.6vw, 2rem);
    letter-spacing: -0.03em;
    text-align: center;
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

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius: 16px;
    background: #fff;
    box-shadow: inset 0 0 0 1px rgba(190, 52, 108, 0.10);
}

table, th, td{
    border:none;
}

th{
    background: linear-gradient(135deg, var(--accent), var(--accent-dark));
    color:white;
    position: sticky;
    top: 0;
    z-index: 1;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    font-size: 0.78rem;
}

th, td{
    padding:11px 10px;
    text-align:center;
    border-bottom:1px solid rgba(190, 52, 108, 0.10);
    font-size: 0.92rem;
}

tbody tr:nth-child(even){
    background: #fff9fb;
}

tbody tr:hover{
    background: var(--row-hover);
}

.header-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 16px;
    margin-bottom: 10px;
}

.header-row p{
    margin: 0;
    color: var(--muted);
    line-height: 1.45;
    font-size: 0.95rem;
}

.badge{
    display:inline-flex;
    align-items:center;
    padding: 6px 12px;
    border-radius: 999px;
    background: var(--accent-soft);
    color: var(--accent-dark);
    font-size: 0.78rem;
    font-weight: 700;
    white-space: nowrap;
}

.table-wrap{
    overflow:auto;
    border-radius: 16px;
    border: 1px solid rgba(190, 52, 108, 0.10);
}

.toolbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    flex-wrap: wrap;
    margin: 12px 0 14px;
}

.count{
    padding: 8px 12px;
    border-radius: 999px;
    background: var(--accent-soft);
    color: var(--accent-dark);
    font-weight: 700;
    font-size: 0.9rem;
}

a{
    text-decoration:none;
    color: var(--accent-dark);
    font-weight: 700;
}

.back-link{
    display:inline-flex;
    align-items:center;
    gap: 8px;
    padding: 9px 14px;
    border-radius: 999px;
    background: var(--accent-soft);
    border: 1px solid rgba(232, 62, 140, 0.16);
}

.empty-row td{
    padding: 24px 16px;
    color: var(--muted);
}

@media (max-width: 900px){
    .header-row,
    .toolbar{
        flex-direction: column;
        align-items: center;
    }

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

<div class="header-badge">Trina's Records</div>

<div class="header-row">
    <div>
        <h2>Dog Information Records</h2>
    </div>
</div>

<div class="toolbar">
    <div class="count"><?php echo $result->num_rows; ?> total records</div>
    <a class="back-link" href="DogRegister.php">Back to Registration</a>
</div>

<div class="table-wrap">
<table>

<thead>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Breed</th>
    <th>Age</th>
    <th>Address</th>
    <th>Color</th>
    <th>Height</th>
    <th>Weight</th>
</tr>

</thead>

<tbody>

<?php

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['d_name']."</td>";
        echo "<td>".$row['d_breed']."</td>";
        echo "<td>".$row['d_age']."</td>";
        echo "<td>".$row['d_add']."</td>";
        echo "<td>".$row['d_color']."</td>";
        echo "<td>".$row['d_height']." in</td>";
        echo "<td>".$row['d_weight']." kg</td>";
        echo "</tr>";
    }

}
else
{
    echo "<tr class='empty-row'><td colspan='8'>No Records Found</td></tr>";
}

?>

</tbody>

</table>

</div>
</body>
</html>