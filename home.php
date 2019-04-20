<?php
include('funct.php');
if(!isset($_SESSION['username']))
{
 header("location:login.php");
}else{
  include ("connect.php");
} 
?>

<html>
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i style="font-size: 40px;color:#00ff00"> Q </i></a>

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="admin.php"><i class="fa fa-fw fa-home"></i> Home </a>
        </li>
      </ul>
    </div>
    <a style="margin-left:auto" class="btn btn-success" href="login.php"> LOGOUT </a>
  </nav><br><br>
   <div class = "col-lg-5 col-md-8 m-auto">    
     <br><i><h1 class="text-center text-primary">"Welcome to Quiz World",<?php echo $_SESSION['username']; ?></h1></i><br><br><br>
     <div class="w3-container">
       <p>Test your skills by attempting the quizes</p>
  
       <div class="w3-green w3-hover-shadow w3-padding-64 w3-center">
         <p>HTML QUIZ</p>
           <a href="quiz.php?n=1&quiz=HTML&ques=questions&ans=answers&usr=users" class="btn btn-primary">Start</a>
       </div><br>
  
       <div class="w3-green w3-hover-shadow w3-padding-64 w3-center">
         <p>CSS QUIZ</p>
         <a href="quiz.php?n=1&quiz=CSS&ques=cssques&ans=cssans&usr=cssusers" class="btn btn-primary">Start</a>
       </div><br>
  
       <div class="w3-green w3-hover-shadow w3-padding-64 w3-center">
         <p>PHP QUIZ</p>
         <a href="quiz.php?n=1&quiz=PHP&ques=phpques&ans=phpans&usr=phpusers" class="btn btn-primary">Start</a>
       </div><br>
        
        <div class="w3-green w3-hover-shadow w3-padding-64 w3-center">
         <p>JavaScript QUIZ</p>
         <a href="quiz.php?n=1&quiz=JavaScript&ques=jsques&ans=jsans&usr=jsusers" class="btn btn-primary">Start</a>
        </div><br>
      </div>
    </div>
</form>
</body>
</html>