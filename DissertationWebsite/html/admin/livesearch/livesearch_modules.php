<?php
$q = intval($_GET['q']);


//Get database info fron config.php
  include_once __DIR__ . "/../../../php/config.php";


//mysqli_select_db($conn, "ajax_demo");
$sql="SELECT * FROM topics WHERE topic_id LIKE '".$q."%'";
$result = mysqli_query($conn, $sql);


$sql2="SELECT * FROM users";
$result2 = mysqli_query($conn, $sql2);


echo "<table class='table table-striped table-hover'>
<tr>
<th>id</th>
<th>topic</th>
<th>subject</th>
</tr>";
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['topic_id'] . "</td>";
        echo "<td>" . $row['topic_name'] . "</td>";
        echo "<td>" . $row['topic_subject'] . "</td>";
        echo "</tr>";
    }
} else {
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "NO MATCH, DISPLAYING FULL TABLE";
        echo "<tr>";
        echo "<td>" . $row2['topic_id'] . "</td>";
        echo "<td>" . $row2['topic_name'] . "</td>";
        echo "<td>" . $row2['topic_subject'] . "</td>";
        echo "</tr>";
    }
}


echo "</table>";
mysqli_close($conn);

?>
