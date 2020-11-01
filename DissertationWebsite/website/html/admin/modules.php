<html>

<head>
  <title>Admin Page</title>

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

  <!-- Live Search -->
  <script>
    function showResult(str) {
      if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        //document.getElementById("livesearch").style.border = "0px";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("livesearch").innerHTML = this.responseText;
          //document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
      }
      xmlhttp.open("GET", "livesearch/livesearch_modules.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>


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
        <div class="col-md-10">
          <h1> Pages <small> Manage your pages </small></h1>
        </div>

        <div class="col-md-2">
          <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle create" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target="#addPage" href="#">Add Page</a>
              <a class="dropdown-item" href="./createuser.php">Create Admin User</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#setGoals" href="#">Set Student Goals</a>
            </div>
          </div>

        </div>


      </div>
    </div>

  </header>

  <section id="breadcrumb">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard/</li>
        <li class="active">Modules</li>
      </ol>

    </div>
  </section>

  <section id="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">

          <div class="list-group">
          <a href="index.php" class="list-group-item list-group-item-action"><i class="fas fa-cogs"></i> Dashboard</a>
          <a href="users.php" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> Users</a>
          <a href="modules.php" class="list-group-item list-group-item-action active"><i class="fas fa-database"></i> Modules</a>
          <a href="pages.php" class="list-group-item list-group-item-action"><i class="fas fa-columns"></i> Pages</a>
    </div>


    </div>

    <div class="col-md-10">
      <!--Search users database-->
      <div class="card">
        <div class="card-header">Modules</div>
        <div class="card-body">
          <div class="row">

            <div class="col-md-12">
              <input class="form-control" type="text" placeholder="Filter by title..." onkeyup="showResult(this.value)">
              <div id="livesearch"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  <!--Modals-->

  <!--Add Page-->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="add page label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="../../php/admin/create_page.php" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="add page label">Add Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" name="body" id="body" placeholder="Page Body"></textarea>
        </div>
        <div class="form-group">
          <!--GET TOPICS FROM DATABASE-->
          <?php include '../../php/admin/create_select.php';?>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="published" id="published"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" name="meta_tag" id="meta_tag" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="create_btn" id="create_btn">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <script>
    CKEDITOR.replace('editor1');
  </script>

  <!--Footer-->
  <div id="footer-placeholder"></div>

  <script>
    $(function() {
      $("#footer-placeholder").load("../footer.php");
    });
  </script>
  <!--end of Footer-->

</body>

</html>
