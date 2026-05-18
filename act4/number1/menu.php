<?php
if (!isset($currentPage)) {
    $currentPage = basename($_SERVER['PHP_SELF']);
}


$stories = [
    'friend1.php' => 'Story 1',
    'friend2.php' => 'Story 2',
    'friend3.php' => 'Story 3',
    'friend4.php' => 'Story 4',
    'friend5.php' => 'Story 5'
];
?>
<nav class="story-grid">
    <?php foreach ($stories as $file => $label): ?>
        <a class="story-card <?php echo $currentPage === $file ? 'active' : ''; ?>" href="<?php echo $file; ?>">
            <span><?php echo $label; ?></span>
        </a>
    <?php endforeach; ?>
</nav>
