<?php
//USE OBJECR ORIENTATED PHP
//Start Session
session_start();

//Define variables & initalize to be empty
$username = "";
$password = "";

//If submit button has been pressed
if (isset($_POST['submit'])) {

  //Get database info fron config.php
      include_once __DIR__ . "/../config.php";

    //Get inputs from fields & store within variables, ensuring safe from SQL injection
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    //Does user exist
    $sql = "SELECT * FROM users WHERE student_id=$username";
    $result = $conn->query($sql);

    //Does Staff Exist NEW
    $staffSql = "SELECT * FROM staff WHERE staff_id=$username";
    $staffResult = $conn->query($staffSql);
    // END NEW

    //Check results
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    //Check Result Staff
    $staffRow = mysqli_fetch_assoc($staffResult);
    $staffCount = mysqli_num_rows($staffResult);

    //Should only get one result
    if ($count == 1) {
        //check that the password is equal to the hashed password stored in the DB
        $hashCheck = password_verify($password, $row['password']);

        if ($hashCheck == false) {
            header("Location: ../../html/login/login.php?login=error");
            exit();
        }
        //If password matches then login user
        elseif ($hashCheck == true) {
            $_SESSION['u_id'] = $row['student_id'];
            $_SESSION['u_topic'] = $row['enrolled_topic'];
            $_SESSION['u_subject'] = $row['enrolled_subject'];
            $_SESSION['u_supervisor'] = $row['supervisor_id'];
            $_SESSION['u_changeTopic'] = $row['allowed_topic_change'];

            header("Location: /");
            exit();
        }
    }
    //STAFF Check
    //Should only get one result
    elseif ($staffCount == 1) {
        //check that the password is equal to the hashed password stored in the DB
        $hashCheckStaff = password_verify($password, $staffRow['password']);

        if ($hashCheckStaff == false) {
            header("Location: ../../html/login/login.php?login=error");
            exit();
        }
        //If password matches then login user
        elseif ($hashCheckStaff == true) {
            $_SESSION['su_id'] = $staffRow['staff_id'];

            header("Location: /");
            exit();
        }
    } else {
        header("Location: ../../html/login/login.php?login=error");
        exit();
    }
}



$conn->close();
?>
