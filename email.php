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
  <div style="margin-top:100px" class="container">   
    <!-- start php code -->
    <?php
      $conn=mysqli_connect("localhost", "bindhu","@nime123","login") or die(mysqli_error($conn)); // Connect to database server(localhost) with username and password.
 
      if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {?>
          <div class="alert alert-success alert-dismissible">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
  				Invalid mail
          </div>
          <?php
        }
        else
        {
          $code = rand(0,10000);
          $hash = md5( rand(0,1000) );
          mysqli_query($conn,"UPDATE `info` SET `code`='".$code."',`hash`='".$hash."' WHERE `email`='".$email."' ") or die(mysqli_error($conn));
        
          $to      = $email; // Send email to our user
          $subject = 'Verification'; // Give the email a subject 
          $message = '
 
          you can login into your account by changing your password.
 
          ------------------------
          Verification code : '.$code.'
          ------------------------

          To change the password click the below link:
          https://www.quizproject.tk/change.php?email='.$email.'&hash='.$hash.'
          '; // Our message above including the link
                     
          $headers = 'From: QuizTime11@gmail.com' . "\r\n";
          mail($to, $subject, $message, $headers); // Send our email
        
          header("location:verify.php?email=".$email);
        }
      }       
    ?>
    <center>
    <!-- title and description -->
    <h3 style="color:#fff">Verification</h3>
    <p style="color:#fff">Please enter your email</p>
           
    <form action="" method="post">
      <input style="width:80%;;margin:10px" type="email" name="email" value="" placeholder="email address......."/>     
      <input style="width:80px" type="submit" class="btn btn-success" value="submit" />
    </form>
    </center>
  </div>
</body>
<footer style="position:absolute" id="footer" class="w3-center w3-black w3-padding-32">
  <i style="color:#c0c0c0">supported by &nbsp;</i><a href="#" class="fa fa-facebook"></a>&nbsp;&nbsp;
  <a href="#" class="fa fa-twitter"></a>&nbsp;&nbsp;
  <a href="#" class="fa fa-google"></a>&nbsp;&nbsp;
  <a href="#" class="fa fa-instagram"></a><br> 
  <i style="color:#c0c0c0">&copy; All rights are reserved | Design by @nonymous_.1</i>
</footer>
</html>