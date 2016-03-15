<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | Bbc MVC</title>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/view/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="navBrand" href="/">PhoenixBook</a>
        </div>
        <?php
          if(isset($_SESSION['userid'])){
            echo '
                <div class="col-xs-12 col-ld-12">
                  <div class="col-xs-8 col-ld-8">
                    <div id="navbar" class="collapse navbar-collapse">
                      <ul class="nav navbar-nav">
                        <li><a href="/editProfile">Edit Profile</a></li>
                      </ul>
                    </div><!--/.nav-collapse -->
                  </div>
              <div class="col-xs-4 col-ld-4">
                <div class="col-xs-6 col-ld-6">
                    <form method="post" action="profile/logout">
                      <input type="submit" value="Edit Profile" class="profileBtn btn btn-warning"/>
                      <input type="submit" value="Logout" class="profileBtn btn btn-warning"/>
                    </form>
                </div>
                <div class="col-xs-6 col-ld-6">
                    <div class="col-xs-4 col-ld-4">
                      <img src="'.$_SESSION['profilbild'].'" class="navbar-picture">
                    </div>
                    <div class="col-xs-6 col-ld-6 navbar-uname">
                      <p>'.$_SESSION['username'].'</p>
                    </div>
                </div>
              </div>
            </div>
            ';
          }
        ?>
      </div>
    </nav>

    <div class="">


<!--    <h1>--><?//= $heading ?><!--</h1>-->
