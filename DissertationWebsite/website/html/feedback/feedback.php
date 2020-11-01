<?php
//Start Session
session_start();

if (!isset($_SESSION["u_id"]) && !isset($_SESSION["su_id"])) {
      header("location: website/html/login/login.php");
   }
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Home Page</title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Dissertation Home Page">
    <meta name="keywords" content="Dissertation, Portal, Newcastle University, Supervisor">
    <meta name="author" content="James Whatnell">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Page CSS -->
    <!--  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">-->
    <link rel="stylesheet" type="text/css" href="../../css/commonCSS.css">

    <!-- FontAwesome Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

  </head>

  <body>

    <!--Navigation bar-->
    <div id="nav-placeholder"></div>

    <script>
      $(function() {
        $("#nav-placeholder").load("../common/nav.php");
      });
    </script>
    <!--end of Navigation bar-->

    <header id="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1> Feedback <small>  </small></h1>
          </div>
        </div>
      </div>
    </header>

    <div class="container-fluid pt-4">
      <p>Click on a submitted piece of work to view feedback from your supervisor.</p>

      <!--Feedback-->
      <?php include '../../php/feedback/getfeedback.php';?>


    </div>

    <script>
      CKEDITOR.replace('editor1');
    </script>


  </body>

  </html>
