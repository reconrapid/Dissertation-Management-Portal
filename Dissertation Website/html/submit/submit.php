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
          <h1> Submission Form <small>  </small></h1>
        </div>
      </div>
    </div>
  </header>

  <div class="container-fluid pt-4">

    <p>Submit a piece of work to be reviewed by your supervisor. If submitting multiple files please zip them.</p>

     <form action="../../php/upload/upload.php" method="post" enctype="multipart/form-data">

       <div class="form-group">
         <label for="file"></label>
         <input type="file" name="fileToUpload" id="fileToUpload " required="required">
       </div>

       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="required">
       </div>

       <div class="form-group">
         <label for="title">Title:</label>
         <input type="title" class="form-control" id="title" placeholder="Enter title" name="title" required="required">
       </div>

       <div class="form-group pt-4">
         <p> Leave a message below describing what you're submitting & what you'd like reviewed. </p>
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
</div>

       <button type="submit" name="btn-upload" class="btn btn-primary">Submit</button>
     </form>

  </div>

</body>

</html>
