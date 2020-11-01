<?php


  //Get database info fron config.php
  include_once __DIR__ . "/../config.php";

  //Select user subject
  $subject = $_SESSION['u_subject'];

  //display all topics that are relevant to that subject
  $sql = "SELECT * FROM topics WHERE topic_subject = '$subject'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<label>Topics</label>";
      echo "<select class='form-control' id='dropselect' name='dropselect'>";
      // output data of each row
      while ($row = $result->fetch_assoc()) {
          echo "<option>" . $row['topic_name'] . "</option>";
      }
      echo "</select>";
  } else {
      echo "0 results";
  }
