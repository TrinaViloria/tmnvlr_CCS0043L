<?php

$name = "Trina Marielle N. Viloria";
$title = "Web Developer";
$location = "San Jose Del Monte, Bulacan";
$phone = "0977 076 0450";
$email = "trinamarielle@gmail.com";
$linkedin = "https://linkedin.com/TrinaViloria";

$skills = [
    "Proficient in HTML5 and CSS3",
    "Experienced in front-end and back-end frameworks",
    "Basic knowledge of DevOps tools"
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $name; ?> - Resume</title>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    background: #fff;
    color: #333;
    padding: 20px;
    line-height: 1.6;
}

.resume {
    max-width: 800px;
    margin: 0 auto;
    border: 2px solid #b1b1b1;
    border-radius: 0;
    padding: 24px;
}

header {
    display: flex;
    align-items: center;
    border-bottom: 3px solid #000000;
    padding-bottom: 20px;
}

.profile-img {
    width: 120px;
    border-radius: 5px;
    margin-right: 20px;
}

.header-info h1 {
    margin: 0;
    font-size: 32px;
}

.header-info h2 {
    margin-top: 5px;
    font-size: 20px;
    font-weight: normal;
}

.contact {
    margin-top: 10px;
    font-size: 14px;
}

section {
    margin-top: 30px;
}

.section-title {
    border-bottom: 2px solid #000000;
    padding-bottom: 5px;
    font-size: 18px;
    text-transform: uppercase;
}

ul {
    padding-left: 20px;
}

.job {
    margin-bottom: 20px;
}
</style>
</head>

<body>

<div class="resume">

<header>
    <img src="Image.jpg" class="profile-img">
    <div class="header-info">
        <h1><?php echo $name; ?></h1>
        <h2><?php echo $title; ?></h2>
        <div class="contact">
            <p>📍 <?php echo $location; ?> | 📞 <?php echo $phone; ?></p>
            <p>📧 <?php echo $email; ?> | 🔗 
                <a href="<?php echo $linkedin; ?>" target="_blank">
                    linkedin.com/TrinaViloria
                </a>
            </p>
        </div>
    </div>
</header>

<section>
    <h3 class="section-title">Profile</h3>
    <p>A highly motivated and detail-oriented Web Developer with a solid foundation in both front-end and back-end technologies.</p>
</section>

<section>
    <h3 class="section-title">Skills</h3>
    <ul>
        <?php foreach ($skills as $skill): ?>
            <li><?php echo $skill; ?></li>
        <?php endforeach; ?>
    </ul>
</section>

<section>
    <h3 class="section-title">Education</h3>
    <p><strong>COLLEGE (2024–2028)</strong><br>FEU Institute of Technology</p>
    <p><strong>SENIOR HIGH SCHOOL (2022–2024)</strong><br>FEU Diliman</p>
    <p><strong>JUNIOR HIGH SCHOOL (2018–2022)</strong><br>Holy Infant Montessori Center</p>
</section>

<section>
    <h3 class="section-title">Certifications</h3>
    <ul>
        <li><strong>Databases</strong></li>
        <li><strong>Java</strong></li>
        <li><strong>Javascript</strong></li>
        <li><strong>Python</strong></li>
    </ul>

</section>


<section>
    <h3 class="section-title">References</h3>
    <p><strong>Maryclaire Dela Cruz</strong><br>Web Designer Head<br>📞 0912 345 6789</p>
</section>

</div>
.fgfgh
</body>
</html>