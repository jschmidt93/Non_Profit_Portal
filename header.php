<?php
session_start();
?>
<header data-role="Header" class="home-header">
  <img alt="image" src="./images/non-profit-portal-logo.png" loading="eager" class="home-image" />
  <a href="index.php" rel="noreferrer noopener" class="home-link">
    Home
  </a>
  <a href="npo-list.php" rel="noreferrer noopener" class="home-link">
    Resource List
  </a>
  <a href="summary.php" rel="noreferrer noopener" class="home-link">
    Summary
  </a>
  <a href="glossary.php" rel="noreferrer noopener" class="home-link1">
    <span class="home-text">Glossary</span>
    <br />
  </a>
  <span>
    <label>Search</label>
    <input id="searchInput" type="text" name="search" value="<?php if (isset($_POST['search'])) {
                                                                echo $_POST['search'];
                                                              } ?>">
    <button id="searchButton" onclick="search()"> Submit </button>
  </span>

  <script>
    function search() {
      searchText = document.getElementById("searchInput").value;
      searchUrl = "search-results.php?search=" + searchText;
      window.location.href = searchUrl;
    }
  </script>

  <?php
  if (!isset($_SESSION['role'])) {
    echo '
    <a href="login.php">
    <button type="button" class="home-button button" class="login-button">Login</button></a>
    ';
  }

  if (isset($_SESSION['role'])) {
    echo '
    <a href="logout.php">
    <button type="button" class="home-button button" class="login-button">Log out</button></a>
    ';
  }
  ?>

</header>