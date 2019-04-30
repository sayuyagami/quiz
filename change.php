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
  <link rel="icon" href="images/logo.png" type="image/icon">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
   body{
    background:url('https://images.unsplash.com/photo-1526738549149-8e07eca6c147?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&dl=fabian-grohs-672016-unsplash.jpg=img.jpg');
    background-repeat:no-repeat;
    background-position:right;
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
       <li class="nav-item active">
         <a class="nav-link" href="login.php"> login <span class="sr-only">(current)</span></a>
       </li>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="registration.php"> Sign up </a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="contact.php"> Contact </a>
       </li>
     </ul>
   </div>
 </nav>
     
    <!-- start wrap div -->   
    <div class="container">
     <!-- start PHP code -->
     <?php
         
     $conn=mysqli_connect("localhost", "bindhu","@nime123","login") or die(mysqli_error($conn)); // Connect to database 
     if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
     {
        // Verify data
        $email = $_GET['email']; // Set email variable
        $hash = $_GET['hash']; // Set hash variable
                 
        $search = mysqli_query($conn,"SELECT email, hash FROM info WHERE email='".$email."' AND hash='".$hash."' ") or die(mysqli_error($conn)); 
        $match  = mysqli_num_rows($search);
    
        if($match>0)
        {
          if(isset($_POST['npass']) && !empty($_POST['npass']) AND isset($_POST['rpass']) && !empty($_POST['rpass']))
           {
             $npass=$_POST['npass'];
             $rpass=$_POST['rpass'];
               if($npass===$rpass)
               {
                 $pass = md5($npass);
                 mysqli_query($conn,"UPDATE `info` SET `password`='".$pass."' WHERE email='".$email."' AND hash='".$hash."' ") or die("updating failed".mysqli_error($conn));
                 ?>
                 <div class="alert alert-success alert-dismissible">
  				 <button type="button" class="close" data-dismiss="alert">&times;</button>
  				 Password updated !!<a href="login.php" class="alert-link"> login now </a>
                 </div>
                 <?php 
                }
            }
        }else{
            ?>
          <div class="alert alert-success alert-dismissible">
  		  <button type="button" class="close" data-dismiss="alert">&times;</button>
  		  invalid approach !!
          </div>
          <?php
        }
     }       
     ?> 
        <center>
        <!-- stop PHP Code -->
        <h3 style="color:#fff">change your password</h3>
         
        <!-- start sign up form -->  
        <form action="" method="post">
           <div class ="loginbox">
            <input type="password" name="npass" placeholder="Enter new password" /><br><br>
            <input type="password" name="rpass" placeholder="Re-enter your password" /><br><br>             
            <input type="submit" class="btn btn-success" value="Update" /><br><br>
            </div>
        </form>
        </center>
         
    </div>
    <!-- end wrap div --> 
</body>
</html>