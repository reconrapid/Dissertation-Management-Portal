<?php
//Start Session
session_start();

//If submit button has been pressed
if (isset($_POST['btn-upload'])) {

  //Get database info fron config.php
      include_once __DIR__ . "/../config.php";


    //Select user id
    $userid = $_SESSION['u_id'];

    //file properties
    $file_name = $_FILES['fileToUpload']['name'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_error = $_FILES['fileToUpload']['error'];

    //Comment box
    $text = mysqli_real_escape_string($conn, $_POST['comment']);

    //Email
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    //Title
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    //file extensions
    //Explode from punctuation mark
    $file_ext = explode('.', $file_name);
    //convert extensions to lower case
    $file_ext = strtolower(end($file_ext));

    //array of allowed file extensions
    $allowed = array('txt', 'jpg', 'zip', 'docx');

    //checking if file extension is within allowed array
    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            // if file size is less than 100 megabytes
            if ($file_size <= 13107200) {
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $file_destination = '../../upload/' . $new_file_name;

                //Insert into database
                $sql = "INSERT INTO upload (file_name, message, uploader_id, title) VALUES ('$file_name', '$text', '$userid', '$title')";
                $result = $conn->query($sql);

                //Message for supervisor
                $subject = "Submission in need of review";
                $comment = "A student has submitted work for review";

                $sql = "SELECT * FROM users WHERE student_id = '$userid' ";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $sql2 = "INSERT INTO notifications(notification_subject, notification_message, notify_supervisor) VALUES ('$subject', '$comment', '$row[supervisor_id]')";
                $conn->query($sql2);

                //MAIL
                // the message
                $msg = "Successfully submitted work";
                // use wordwrap() if lines are longer than 70 characters
                $msg = wordwrap($msg, 70);
                // send email
                mail($email, "Submission", $msg);


                move_uploaded_file($file_tmp, $file_destination);
                header("Location: ../../html/submit/submit.php?uploadsuccess");
            } else {
                echo "File too large";
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "File type not allowed";
    }
}
