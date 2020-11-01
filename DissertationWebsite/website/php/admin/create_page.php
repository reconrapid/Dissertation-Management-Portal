<?php

//If submit button has been pressed
if (isset($_POST['create_btn'])) {

  //Get database info fron config.php
      include_once __DIR__ . "/../config.php";

    //Title
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    //Body
    $body = mysqli_real_escape_string($conn, $_POST['editor1']);
    //Meta Tags
    $meta_tag = mysqli_real_escape_string($conn, $_POST['meta_tag']);
    //Meta Description
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    //Topic
    $topic = mysqli_real_escape_string($conn, $_POST['dropselect']);
    //Publised
    $published = mysqli_real_escape_string($conn, $_POST['published']);

    //Get topics
    $sql2 = "SELECT topic_id FROM topics WHERE topic_name = '$topic'";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();

    //Make entry into database
    $sql = "INSERT INTO pages (page_topic, published, file_location) VALUES ('$row[topic_id]', '$published', '$title')";
    $result = $conn->query($sql);

    //Select we page we just created
    $sql3 = "SELECT * FROM pages WHERE file_location = '$title'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();

    //Create page in topicinfo
    $myfile = fopen("../../html/topics/topicinfo/" . $row3["file_location"] . ".php", "w") or die("Unable to open file!");

    // Page template
    $template = '
    <html>
    <head>
      <title>' . $title . '</title>

      <!-- Required meta tags -->
      <meta charset="UTF-8">

      <meta name="description" content=" ' . $meta_description . '">
      <meta name="keywords" content=" ' . $meta_tag . '">


      <meta name="author" content="James Whatnell">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

      <!-- Page CSS -->
      <link rel="stylesheet" type="text/css" href="../../css/commonCSS.css">

      <!-- FontAwesome Icons -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

      <!-- Scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

<body>
  <!--Navigation bar-->
  <div id="nav-placeholder"></div>

  <script>
    $(function() {
      $("#nav-placeholder").load("../nav.php");
    });
  </script>
  <!--end of Navigation bar-->

  <header id="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1> Welcome! <small></small></h1>
        </div>
      </div>
    </div>
  </header>
  <div class="container-fluid pt-4">' . $body . '</div></body></html>';


    fwrite($myfile, $template);
    fclose($myfile);
    //header("Location: ../html/admin/index.php?createsuccess");

}
