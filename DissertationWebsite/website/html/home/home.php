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
    <link rel="stylesheet" type="text/css" href="website/css/commonCSS.css">

    <!-- FontAwesome Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <script>
      function load_Notification(str) {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //document.getElementById("notification").innerHTML=this.responseText;
            document.getElementById("notification").innerHTML = data['notification'];
          }
        }
        xmlhttp.open("GET", "website/php/notification/notifications.php?seen=" + str, true);
        xmlhttp.send();
      }

      //When click on notification we have seen the notification
      $(document).on('click', '.clear', function() {
        //$('.clear').html('');
        var selected = $(this).attr('value');
        load_Notification(selected);
      });

      // check notifcations every 5 seconds
      setInterval(function() {
        load_Notification();
      }, 5000);
    </script>

  </head>

  <body onload="load_Notification()">

    <!--Navigation bar-->
    <div id="nav-placeholder"></div>

    <script>
      $(function() {
        $("#nav-placeholder").load("website/html/common/nav.php");
      });
    </script>
    <!--end of Navigation bar-->

    <header id="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1> Welcome! <small>    <!-- message if user is logged in-->
              <?php
              if (isset($_SESSION['u_id'])) {
                  echo $_SESSION['u_id'];
              }
              elseif (isset($_SESSION['su_id'])) {
                  echo $_SESSION['su_id'];
              }
              ?>  </small></h1>
          </div>
        </div>
      </div>

    </header>


    <div class="container-fluid pt-4">

      <form>
        <div class='card'>
          <div class='card-header remember' value='2323'>

            <a class='collapsed d-block' data-toggle='collapse' href='#collapse-collapsed' aria-expanded='true' aria-controls='collapse-collapsed' id='heading-collapsed'>
            <span class='label label-pill label-danger pull-right ' style='border-radius:10px;'></span>
            <i class='fa fa-chevron-down pull-right'></i> Notifications </a> </div>

          <div id='collapse-collapsed' class='collapse' aria-labelledby='heading-collapsed'>

      </form>

      <!--Notifcations-->
      <div id="notification"></div>


      </div>


      </div>


      <div class="row pt-4">
        <!--Supervisor Card-->


        <div class="col-sm-3">


          <?php
          if (isset($_SESSION['u_id'])) {
              echo   '<div id="supervisor-placeholder"></div>';
          }
          ?>

          <script>
            $(function() {
              $("#supervisor-placeholder").load("website/php/home/supervisor_cards.php");
            });
          </script>

        </div>


        <!--Goals-->
        <div class="col-sm-9">
            <?php
          if (isset($_SESSION['u_id'])) {
          echo '<div class="card">
            <div class="card-header">Goals</div>
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
          </div>';
        }
        ?>

        </div>

      </div>

    </div>

    <!--Footer-->
    <div id="footer-placeholder"></div>

    <script>
      $(function() {
        $("#footer-placeholder").load("website/html/common/footer.php");
      });
    </script>
    <!--end of Footer-->

  </body>

  </html>
