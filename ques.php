<?php
include('funct.php');
if(!isset($_SESSION['type']) && empty($_SESSION['type']))
{
 header("location:login.php");
}else{
  $uname=$_SESSION['username'];
}
?>

<html>
<head>
  <title>admin</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link type="text/css" href="admin.css" rel="stylesheet">
  <link rel="icon" href="images/logo.png" type="image/icon">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i style="font-size: 40px;color:#00ff00"> Q </i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="admin.php"><i class="fa fa-fw fa-home"></i> Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php"><i class="fa fa-fw fa-user"></i> Students </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           Results
          </a>

          <div class="dropdown-menu">
            <a class="dropdown-item" href="results.php?quiz=HTML&usr=users">HTML</a>
            <a class="dropdown-item" href="results.php?quiz=CSS&usr=cssusers">CSS</a>
            <a class="dropdown-item" href="results.php?quiz=PHP&usr=phpusers">PHP</a>
            <a class="dropdown-item" href="results.php?quiz=JavaScript&usr=jsusers">JavaScript</a>
          </div>  
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="ques.php"> Questions ? <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feed.php"> Feedback </a>
        </li>
      </ul>
    </div>
    <a style="margin-left:auto" class="btn btn-success" href="logout.php"> LOGOUT </a>
  </nav><br><br>

  <div class="container">
    <div class="well">View Questions</div>
    <div class="w3-default w3-hover-shadow w3-center">
      <a href="Qques.php?quiz=HTML&ques=questions&ans=answers" style="text-decoration: none"><i style="font-size: 20px"> HTML Quiz Questions >> </i></a>
    </div><br>
    <div class="w3-default w3-hover-shadow w3-center">
      <a href="Qques.php?quiz=CSS&ques=cssques&ans=cssans" style="text-decoration: none"><i style="font-size: 20px"> CSS Quiz Questions >> </i></a>
    </div><br>
    <div class="w3-default w3-hover-shadow w3-center">
      <a href="Qques.php?quiz=PHP&ques=phpques&ans=phpans" style="text-decoration: none"><i style="font-size: 20px"> PHP Quiz Questions >> </i></a>
    </div><br>
    <div class="w3-default w3-hover-shadow w3-center">
      <a href="Qques.php?quiz=JavaScript&ques=jsques&ans=jsans" style="text-decoration: none"><i style="font-size: 20px"> JS Quiz Questions >> </i></a>
    </div>
  </div>
</body>
</html>