<?php
//Hash password, USED FOR CREATING USERS
//$securepassword = password_hash($password, PASSWORD_DEFAULT)

//Define variables & initalize to be empty
$username = "";
$password = "";

//If submit button has been pressed
if (isset($_POST['submit'])) {

  //Get database info fron config.php
    include_once __DIR__ . "/../config.php";

    //Get inputs from fields & store within variables // ensuring safe from SQL injection
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    //check for empty fields
    if (empty($username) || empty($password)) {
        header("Location: ../../html/admin/createuser.php?create_user=empty");
        exit();
    } else {
        //Checking input characters
        if (!preg_match("/^[0-9]*$/", $username) || !preg_match("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $password)) {
            header("Location: ../../html/admin/create_user.php?create_user=invalid");
            exit();
        } else {
            //$sql = "SELECT * FROM users WHERE student_id = '$username'";
            $sql = "SELECT * FROM staff WHERE staff_id = '$username'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);

            // if we get a result then that user already exists
            if ($count > 0) {
                header("Location: ../../html/admin/createuser.php?create_user=useralreadyexists");
                exit();
            } else {
                //hash password
                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                //create user in database
                //$sql = "INSERT INTO users (student_id, password, enrolled_topic) VALUES ('$username', '$hashedpassword', NULL)";
                $sql = "INSERT INTO staff (staff_id, password) VALUES ('$username', '$hashedpassword')";
                $result = $conn->query($sql);
                header("Location: ../../html/admin/createuser.php?create_user=success");
                exit();
            }
        }
    }
} else {
    header("Location: ../../html/admin/create_user");
    exit();
}

$conn->close();
