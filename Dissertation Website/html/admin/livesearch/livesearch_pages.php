<?php
//Start Session
session_start();

$q = intval($_GET['q']);


//Get database info fron config.php
  include_once __DIR__ . "/../../../php/config.php";


//mysqli_select_db($conn, "ajax_demo");
$sql="SELECT * FROM pages WHERE page_id LIKE '".$q."%'";
$result = mysqli_query($conn, $sql);


$sql2="SELECT * FROM pages";
$result2 = mysqli_query($conn, $sql2);


echo "<table class='table table-striped table-hover'>
<tr>
<th>Title</th>
<th>Published</th>
<th></th>
</tr>";
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['page_id'] . "</td>";
        echo "<td>" . $row['published'] . "</td>";
        echo "<td><a class='btn btn-default remember' href='edit.php?id=" . $row['page_id'] . "'>Edit</a> <a class='btn btn-danger' href='#'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "NO MATCH, DISPLAYING FULL TABLE";
        echo "<tr>";
        echo "<td>" . $row2['page_id'] . "</td>";
        echo "<td>" . $row2['published'] . "</td>";
        echo "<td><a class='btn btn-default remember' href='edit.php?id=" . $row2['page_id'] . "'>Edit</a> <a class='btn btn-danger' href='#'>Delete</a></td>";
        echo "</tr>";
    }
}


echo "</table>";
mysqli_close($conn);

?>
