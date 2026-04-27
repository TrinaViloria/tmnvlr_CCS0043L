<?php

$name = "Trina Marielle N. Viloria";
$title = "Aspiring Full-Stack Web Developer";
$location = "San Jose Del Monte, Bulacan";
$phone = "0977 076 0450";
$email = "trinamarielle30@gmail.com";
$linkedin = "https://www.linkedin.com/in/tmnvlr/";

$summary = "Information Technology student focused on building responsive, user-friendly web applications. I enjoy turning ideas into clean, practical solutions and continuously improving through projects, collaboration, and feedback.";

$coreSkills = [
    "HTML5, CSS3, JavaScript",
    "Responsive web design",
    "Problem-solving and collaboration",
    "UI prototyping and wireframing"
];

$projects = [
    [
        "name" => "Bakery Management System",
        "details" => "Developed a web-based system to manage bakery products, customer orders, and daily sales records with searchable data views.",
        "stack" => "MySQL, HTML, CSS, JavaScript"
    ],
    [
        "name" => "Inventory Management System",
        "details" => "Built a CRUD web application for tracking stock levels, supplier information, and inventory transactions with low-stock monitoring.",
        "stack" => "C++"
    ]
];


$education = [
    ["level" => "College", "school" => "FEU Institute of Technology", "year" => "2024 - 2028"],
    ["level" => "Senior High School", "school" => "FEU Diliman", "year" => "2022 - 2024"],
    ["level" => "Junior High School", "school" => "Holy Infant Montessori Center", "year" => "2018 - 2022"]
];

$certifications = [
    "Databases",
    "Java",
    "JavaScript",
    "Python"
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $name; ?> - Resume</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="resume">

<header>
    <img src="Image.jpg" class="profile-img" alt="Profile photo">
    <div class="header-info">
        <h1><?php echo $name; ?></h1>
        <h2><?php echo $title; ?></h2>
        <div class="contact">
            <p><?php echo $location; ?> | <?php echo $phone; ?></p>
            <p><?php echo $email; ?> | 
                <a href="<?php echo $linkedin; ?>" target="_blank">
                    linkedin.com/TrinaViloria
                </a>
            </p>
        </div>
    </div>
</header>

<div class="content-grid">
    <section>
        <h3 class="section-title"><i class="fa-solid fa-user icon" aria-hidden="true"></i>Professional Summary</h3>
        <p><?php echo $summary; ?></p>
    </section>

    <section>
        <h3 class="section-title"><i class="fa-solid fa-screwdriver-wrench icon" aria-hidden="true"></i>Core Skills</h3>
        <ul>
            <?php foreach ($coreSkills as $skill): ?>
                <li><?php echo $skill; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <h3 class="section-title"><i class="fa-solid fa-diagram-project icon" aria-hidden="true"></i>Projects</h3>
        <?php foreach ($projects as $project): ?>
            <div class="project">
                <strong><?php echo $project["name"]; ?></strong>
                <p class="meta"><?php echo $project["details"]; ?></p>
                <span class="tag"><?php echo $project["stack"]; ?></span>
            </div>
        <?php endforeach; ?>
    </section>


    <section>
        <h3 class="section-title"><i class="fa-solid fa-graduation-cap icon" aria-hidden="true"></i>Education</h3>
        <?php foreach ($education as $item): ?>
            <div class="edu-item">
                <strong><?php echo $item["level"]; ?></strong>
                <p class="meta"><?php echo $item["school"]; ?> | <?php echo $item["year"]; ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <section>
        <h3 class="section-title"><i class="fa-solid fa-certificate icon" aria-hidden="true"></i>Certifications</h3>
        <ul>
            <?php foreach ($certifications as $certification): ?>
                <li><?php echo $certification; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>

</div>

</body>
</html>