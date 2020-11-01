<html>

<head>
  <title>Login</title>

  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="description" content="Dissertation Portal">
  <meta name="keywords" content="Dissertation, Portal, Newcastle University, Supervisor">
  <meta name="author" content="James Whatnell">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Page CSS -->
  <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css">

  <!-- FontAwesome Icons -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head>

<body>
  <div class="container">
    <div class="row vertical-offset">
      <div class="col-md-8 offset-md-2">
        <div class="jumbotron">

            <h1> Login Gateway </h1>
            <h5> Enter your username & password: </h5>

          <form action="../../php/login/login.php" method="POST">
            <div class="input-group pt-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa fa-user-circle fa-fw"></i></span>
              </div>
              <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa fa-lock fa-fw"></i></span>
              </div>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            </div><br>
            <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login">
          </form>

        </div>
      </div>
    </div>
  </div>

</body>

</html>
