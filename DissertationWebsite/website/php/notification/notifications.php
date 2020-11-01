<?php
//Start Session
session_start();

$read = $_GET["seen"];


//Get database info fron config.php
  include_once __DIR__ . "/../config.php";

//Select user id
$user_id = $_SESSION['u_id'];

//Select staff id
$staff_id = $_SESSION['su_id'];

if ($read !== "") {
    //If opened set notifcations status to read
    $update_query = "UPDATE notifications SET status=1 WHERE status=0 AND notification_id = $read ";
    $result = mysqli_query($conn, $update_query);
}

if (isset($_SESSION['u_id'])) {
$sql = "SELECT * FROM notifications WHERE notify_user = $user_id AND status=0";
$result = mysqli_query($conn, $sql);
$output = '';

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
          $output .= "
        <div class='card-body clear' value=" . $row['notification_id'] . ">
        <a href='#'>
        <strong>" . $row['notification_subject'] . "</strong><br />
        <small><em>" . $row['notification_message'] . "</em></small>
        </a></div>";
    }
} else {
        $output .="
    <div class='card-body'>
    <a href='#'>
    <strong> No Current Notifications </strong><br />
    </a></div>";
  }
} elseif(isset($_SESSION['su_id'])) {
  $sql = "SELECT * FROM notifications WHERE notify_supervisor = $staff_id AND status=0";
  $result = mysqli_query($conn, $sql);
  $output = '';

  if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_array($result)) {
            $output .= "
          <div class='card-body clear' value=" . $row['notification_id'] . ">
          <a href='#'>
          <strong>" . $row['notification_subject'] . "</strong><br />
          <small><em>" . $row['notification_message'] . "</em></small>
          </a></div>";
      }
  } else {
          $output .="
      <div class='card-body'>
      <a href='#'>
      <strong> No Current Notifications </strong><br />
      </a></div>";
    }
}

  //Get number of unread notifications
  $count = mysqli_num_rows($result);

  //JSON, sending data back to client
  $data = array('notification' => $output, 'unseen_notification' => $count);
  echo json_encode($data);



mysqli_close($conn);
