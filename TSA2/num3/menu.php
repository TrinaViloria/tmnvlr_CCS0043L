<?php
$items = [
  'personal' => 'Personal',
  'career' => 'Career Objective',
  'education' => 'Education',
  'skills' => 'Skills',
  'affiliation' => 'Affiliation',
  'work' => 'Work Experience',
];

$current = isset($page) ? $page : (isset($_GET['page']) ? $_GET['page'] : 'personal');
?>
<nav class="menu">
  <?php foreach ($items as $key => $label):
    $active = ($key === $current) ? 'active' : '';
  ?>
    <a class="menu-item <?php echo $active; ?>" href="?page=<?php echo $key; ?>">
      <span><?php echo $label; ?></span>
    </a>
  <?php endforeach; ?>
</nav>