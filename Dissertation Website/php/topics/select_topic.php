<?php
//Start Session
session_start();

//If submit button has been pressed
if (isset($_POST['btn-select'])) {

  //Get database info fron config.php
      include_once __DIR__ . "/../config.php";


    //Select user id
    $userid = $_SESSION['u_id'];

    //Selection
    $topic = $_POST['dropselect'];


    $sql2 = "SELECT topic_id FROM topics WHERE topic_name = '$topic'";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();

    $sql = "UPDATE users SET enrolled_topic='$row[topic_id]' WHERE student_id = '$userid'";

    if ($conn->query($sql) === true) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
