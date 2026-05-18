<?php if (!isset($profile)) { require_once 'data.php'; } ?>
<section>
  <h3>Personal Information</h3>
  <div class="profile">
    <div>
      <p><strong>About me</strong></p>
      <p><?php echo htmlspecialchars($profile['about']); ?></p>
      <div class="info-chips">
        <div class="contact-card">Location: <?php echo htmlspecialchars($profile['location']); ?></div>
        <div class="contact-card">Open to: <?php echo htmlspecialchars($profile['open_to']); ?></div>
      </div>
    </div>
    <aside>
      <p><strong>Contact</strong></p>
      <p>Email: <a href="mailto:<?php echo htmlspecialchars($profile['email']); ?>"><?php echo htmlspecialchars($profile['email']); ?></a></p>
      <p>Phone: <?php echo htmlspecialchars($profile['phone']); ?></p>
    </aside>
  </div>
</section>