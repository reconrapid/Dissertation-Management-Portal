<!-- Note:: Options of how to use this code on every page without writing it on every html page,
1. Use javascript AJAX
2. Use PHP includes -->

<?php
//Start Session
session_start();
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

<!-- Brand/logo -->
<a class="navbar-brand" href="/">
  <img src="https://preview.ibb.co/m08SnS/Dissertation_Logo5.png" alt="logo" style="width:40px; height:40px;">
</a>

<!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

<!-- Links -->
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="../../../../website/html/topics/topics.php">Dissertation Topics</a>
  </li>
  <!--Only display if user is student-->
  <?php
  if (isset($_SESSION['u_id'])) {
      echo '<li class="nav-item">';
      echo '<a class="nav-link" href="../../../../website/html/submit/submit.php">Submit</a></li>';
  }
?>
  <li class="nav-item">
    <a class="nav-link" href="../../../../website/html/feedback/feedback.php">Feedback</a>
  </li>
  <!--Only display if user is admin-->
  <?php
  if (isset($_SESSION['su_id'])) {
      echo '<li class="nav-item">';
      echo '<a class="nav-link" href="../../../../website/html/admin/index.php">Admin</a></li>';
  }
?>
</ul>

<!-- Right side -->
<!--Only display if user logged in-->
<?php
if (isset($_SESSION['u_id']) || isset($_SESSION['su_id'])) {
    echo '<form action="../../../../website/php/login/logout.php" method="POST" class="form-inline my-auto ml-auto">';
    echo '<button class="btn btn-outline-success" type="submit" name="submit"><i class="fas fa-sign-out-alt"></i> Logout</button></form>';
}
?>

</div>
</nav>
