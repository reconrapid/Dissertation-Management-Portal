 <?php
//LIVE VERSION

// Database info
$servername = "localhost";
$dbusername = "fffcbdad_recon";
$dbpassword = "Stealthgamer6190";
$dbname = "fffcbdad_website";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";



//XAMP VERSION

// Database info
//$servername = "localhost";
//$dbusername = "admin";
//$dbpassword = "Warcraft6190";
//$dbname = "website";

// Create connection
//$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//Connect successfully
//echo "Connected successfully";

?>
