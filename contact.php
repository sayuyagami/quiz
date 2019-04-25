<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style type="text/css">
     body{
          background:url("https://img1.goodfon.com/wallpaper/nbig/b/31/abstract-colors-background-7311.jpg");
          background-size: cover;
          background-position: fixed;
        }  
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i style="color:#00ff00;font-size:30px">Q</i><i style="color:#00ffff">uiz</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php"> Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php"> About </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"> login </a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php"> Sign up </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="contact.php"> Contact <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
 </nav>
 <?php
    include ("connect.php");
    //onclick submit
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
      $name=$_POST['uname'];
      $email=$_POST['email1'];
      $text=$_POST['subject'];

      //insert data into contact table
      mysqli_query($con,"INSERT INTO `contact`(`name`, `email`, `subject`) VALUES ('$name','$email','$text')") or die("failed".mysqli_error($con));
      ?>
      <div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert">×</button>Feedback sent <strong>Successfully!!</strong>
      </div>
      <?php  
    }
  ?>  
 <div class="container">
    <div style="text-align:center">
      <h2 style="color:#fff">Contact Us</h2>
      <p style="color:#fff">We would love to here your thoughts about our work:</p>
    </div>
    <div class="row">
      <div class="column">
        <img src="https://www.mantri.in/pinnacle/images/pinnacle-map.jpg" style="width:100%">
      </div>
      <div class="column">
        <form action="contact.php" method="post">
          <label style="color:#fff">Name</label><br>
          <input style='width:100%' type="texts" name="uname" placeholder="Your name.."><br><br>
          <label style="color:#fff;width: 100%">Email</label><br>
          <input style='width:100%' type="email" name="email1" placeholder="@gmail.com.."><br><br>
          <label style="color:#fff">Subject</label><br>
          <textarea name="subject" placeholder="Send us feedback....." style="height:170px"></textarea>
          <input type="submit" name="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
    </div>
  </div> 

  <footer class="w3-center w3-black w3-padding-32">
    <i style="color:#c0c0c0">supported by &nbsp;</i><a href="#" class="fa fa-facebook"></a>&nbsp;&nbsp;
    <a href="#" class="fa fa-twitter"></a>&nbsp;&nbsp;
    <a href="#" class="fa fa-google"></a>&nbsp;&nbsp;
    <a href="#" class="fa fa-instagram"></a><br> 
    <i style="color:#c0c0c0">&copy; All rights are reserved | Design by @nonymous_.1</i>
  </footer>
</body>
</html>   