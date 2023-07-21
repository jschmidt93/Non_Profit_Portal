<?php
session_start();
?>
<link rel="icon" href="/images/npo-favicon.png" type="image/x-icon">
<header data-role="Header" class="home-header">
  <a href="index.php"><img alt="image" src="./images/non-profit-portal-logo.png" loading="eager" class="home-image" /></a>
  <a href="index.php" rel="noreferrer noopener" class="home-link">
    NPO Grid View
  </a>
  <a href="npo-list.php" rel="noreferrer noopener" class="home-link1">
    <span class="home-text">NPO List View</span>
    <br />
  </a>
  <a href="reports.php" rel="noreferrer noopener" class="home-link">
    Reports
  </a>
  

  <?php
  if (!isset($_SESSION['permissions'])) {
    echo '
    <a href="login.php">
    <button type="button" class="home-button button" class="login-button">Login</button></a>
    ';
  }

  if (isset($_SESSION['permissions'])) {
    echo '
    <a href="logout.php">
    <button type="button" class="home-button button" class="login-button">Log out</button></a>
    ';
  }
  ?>

</header>