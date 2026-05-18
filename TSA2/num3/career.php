<?php if (!isset($profile)) { require_once __DIR__ . '/data.php'; } ?>
<section>
  <h3>Career Objective</h3>
  <p>I aspire to grow as a full-stack developer by building accessible, user-friendly web applications while continuously learning modern technologies and tools.</p>
  <ul class="objective-list">
    <li>Looking for: <?php echo htmlspecialchars($profile['looking_for']); ?></li>
    <li>Available: <?php echo htmlspecialchars($profile['available']); ?></li>
  </ul>
</section>