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
    <!-- start php code -->
    <?php
      $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error($conn)); // Connect to database server(localhost) with username and password.
      mysqli_select_db($conn,"login") or die(mysqli_error($conn)); // Select registrations database.
 
      if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
          echo '<div class ="stausmsg">email is not valid</div>';
        }
        else
        {
          $hash = md5( rand(0,1000) );
          mysqli_query($conn,"UPDATE `info` SET `hash`='".$hash."' WHERE `email`='".$email."') or die(mysqli_error($conn));
        
          $to      = $email; // Send email to our user
          $subject = 'Verification'; // Give the email a subject 
          $message = '
 
          you can login into your account by changing your password.
 
          ------------------------
 
          To change the password click the below link:
          http://localhost/511/verify.php?email='.$email.'&hash='.$hash.''; // Our message above including the link
                     
          $headers = 'From:QuizTime11@yourwebsite.com' . "\r\n"; // Set from headers
          mail($to, $subject, $message, $headers); // Send our email
          echo '<div class ="statusmsg">check your mail the link has been sent</div>';
        }
      }
             
    ?>
    <!-- title and description -->
    <h3>Verification</h3>
    <p>Please enter your email</p>
           
    <form action="" method="post">
      <label for="email">Email:</label>
      <input type="text" name="email" value="" />
             
      <input type="submit" class="btn btn-success" value="submit" />
    </form>
  </div>
</body>
</html>