<?php
require_once __DIR__ . '/data.php';
?>
<header class="header fade-in">
  <div class="header-left">
    <div class="photo">
      <img src="Image.JPG" alt="avatar">
    </div>
    <div class="name-block">
      <h1 class="name"><?php echo htmlspecialchars($profile['name']); ?></h1>
      <div class="role"><?php echo htmlspecialchars($profile['role']); ?></div>
      <div class="contacts">
        <a href="mailto:<?php echo htmlspecialchars($profile['email']); ?>"><?php echo htmlspecialchars($profile['email']); ?></a>
        <span>•</span>
        <a href="#"><?php echo htmlspecialchars($profile['phone']); ?></a>
      </div>
    </div>
  </div>
    <div class="header-right">
    <p class="summary"><?php echo htmlspecialchars($profile['summary']); ?></p>
  </div>
</header>