<?php


  //Get database info fron config.php
  include_once __DIR__ . "/../config.php";

  //Select user subject
  $subject = $_SESSION['u_subject'];

  //display all topics that are relevant to that subject
  $sql = "SELECT * FROM topics WHERE topic_subject = '$subject'";
  $result = $conn->query($sql);

  //Supervisor dissertation_selection
  $sql2 = "SELECT * FROM topics";
  $result2 = $conn->query($sql2);


// Student Topics
if (isset($_SESSION['u_id'])) {
    if ($result->num_rows > 0) {
        echo "<ul class='list-group'>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {

        //Get link for each page
            $sql3 = "SELECT * FROM pages WHERE page_topic = '$row[topic_id]'";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();

            // Need to use rows in the database to get exact topic
            echo "<a href='topicinfo/" . $row3['file_location']  . ".php' class='list-group-item list-group-item-action'>" . $row['topic_name'] . "</a>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}

// Supervisor Topics
else {
    if ($result2->num_rows > 0) {
        echo "<ul class='list-group'>";
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {

        //Get link for each page
            $sql4 = "SELECT * FROM pages WHERE page_topic = '$row2[topic_id]'";
            $result4 = $conn->query($sql4);
            $row4 = $result4->fetch_assoc();

            // Need to use rows in the database to get exact topic
            echo "<a href='topicinfo/" . $row4['file_location']  . ".php' class='list-group-item list-group-item-action'>" . $row2['topic_name'] . "</a>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}
