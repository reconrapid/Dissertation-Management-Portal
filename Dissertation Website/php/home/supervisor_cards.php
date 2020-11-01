<?php
session_start();

  //Get database info fron config.php
  //include_once("/../config.php");
  include_once __DIR__ . "/../config.php";


  //Select user supervisor
  $supervisor = $_SESSION['u_supervisor'];

  //display all topics that are relevant to that subject
  $sql = "SELECT * FROM staff WHERE staff_id = '$supervisor'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<div class='card' style='max-width: 400px'>";
      // output data of each row
      while ($row = $result->fetch_assoc()) {
          echo "<img class='card-img-top' src='website/img/img_avatar.png' alt='Card image' style='width:100%'>";
          echo "<div class='card-body'>";
          echo "<h4 class='card-title'>" . $row['name'] . "</h4>";
          echo "<p class='card-text'>Contact Details: " . $row['email'] . "</p>";
          echo "<a href=' " . $row['profile_link'] . "' class='btn btn-primary'>See Profile</a>";
      }
      echo "</div></div>";
  } else {
      echo "0 results";
  }
?>
