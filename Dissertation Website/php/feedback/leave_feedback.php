<?php
//Start Session
session_start();

//If submit button has been pressed
if (isset($_POST['btn-select'])) {

  //Get database info fron config.php
    include_once __DIR__ . "/../config.php";

    //Select id
    $id = $_POST['btn-select'];

    //POSTS
    $feedback = $_POST['editor1'];

    //Select student work belongs to
    $sql = "SELECT * FROM upload WHERE id = '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    //Message for student
    $subject = "Feedback recieved";
    $comment = "You have recieved feedback on a submitted piece of work";

    $sql2 = "INSERT INTO notifications(notification_subject, notification_message, notify_user) VALUES ('$subject', '$comment', '$row[uploader_id]')";
    $conn->query($sql2);

    $sql = "UPDATE upload SET feedback='$feedback' WHERE id = '$id'";

    if ($conn->query($sql) === true) {
        header("Location: ../../html/feedback/feedback.php?success");
        //echo "Record updated successfully";
    } else {
        header("Location: ../../html/feedback/feedback.php?record=error");
        //echo "Error updating record: " . $conn->error;
    }
}
