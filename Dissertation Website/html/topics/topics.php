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
  <title>Topics</title>

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
          <h1> Dissertation Topics <small>  </small></h1>
        </div>
      </div>
    </div>
  </header>

  <div class="container-fluid pt-4">
    <!-- Add something to check whether person has already selected a topic -->
    <p>Click a dissertation topic to find out more about the topic that interests you! When you are ready to select a dissertation topic click the button at the bottom of this page.</p>

  <!--GET TOPICS FROM DATABASE-->

  <?php include '../../php/topics/dissertation_topics.php';?>


<!-- Add margin to the top, use size 3 -->
    <div class="mt-4">
      <?php
      if (isset($_SESSION['u_id'])) {
          if ($_SESSION['u_topic'] == '') {
              echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectTopic">Select Dissertation Topic</button>';
          }
          if ($_SESSION['u_changeTopic'] == '1') {
              echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectTopic">Change Dissertation Topic</button>';
          } else {
          }
      }
      ?>

    </div>

  </div>


  <!--Modals-->

  <!--Select Topic-->
  <div class="modal fade" id="selectTopic" role="dialog" aria-labelledby="select topic modal" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <!-- Modal content-->
    <div class="modal-content">
        <form action="../../php/topics/select_topic.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="select topic modal">Select Topic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!--GET TOPICS FROM DATABASE-->
            <?php include '../../php/topics/dissertation_selection.php';?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn-select">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>




</body>

</html>
