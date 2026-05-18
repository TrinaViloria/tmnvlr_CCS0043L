<?php

$allowed = ['personal','career','education','skills','affiliation','work'];
$page = 'personal';
if (!empty($_GET['page']) && in_array($_GET['page'], $allowed, true)) {
	$page = $_GET['page'];
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Resume</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<?php require_once 'header.php'; ?>
		<div class="layout">
			<?php require_once 'menu.php'; ?>
			<div class="content">
				<?php
					$file = $page . '.php';
					if (file_exists($file)) {
						include $file;
					} else {
						echo '<p>Page not found.</p>';
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
