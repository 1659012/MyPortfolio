<!-- <div class="container-fluid navbar-container"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="portfolio-info.php">Portfolio&nbsp;info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login/Resgister</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="logout">Logout</a>
      </li>
<?php
if ($_SESSION['login']) {
    echo '<li class="nav-item" id="uid"  uid=' . $_SESSION['user'] . '>' .
        '<a class="nav-link"href="user.php">Hi,&nbsp;' . $_SESSION['user'] . '</a>' .
        '</li>';}
?>
    </ul>
</nav>
<!-- </div> -->

<!-- The Modal for logout -->
<div id="myModal" class="modal">
  <div class="modal-content">
  <div class="modal-header">
    <h5>Do you want to logout?</h5>
    <span class="close-button">&times;</span>
  </div>
  <div class="modal-body">
    <button type="button" class="btn btn-info goback">Go back</button>
    <button type="button" class="btn btn-danger"><a href="logout.php">Logout</a></button>
  </div>
  </div>
</div>

