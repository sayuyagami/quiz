<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>OUR > LJI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel ="stylesheet" href="style.css" type="text/css">
    <style> 
body{
 background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('https://images.unsplash.com/photo-1526738549149-8e07eca6c147?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&dl=fabian-grohs-672016-unsplash.jpg=img.jpg');
background-size: cover;
background-position: center;
}
</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OUR > LJI </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Sign up</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
</nav>
     
    <!-- start wrap div -->  
    <div id="wrap">
         
        <!-- start php code -->
      <!-- start PHP code -->
<?php
  $conn=mysqli_connect("localhost", "bindhu","@nime123") or die(mysqli_error($conn)); // Connect to database server(localhost) with username and password.
mysqli_select_db($conn,"test") or die(mysqli_error($conn)); // Select registrations database.
 
    if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
       $uname = $_POST['username'];
$email = $_POST['email'];
$pass =$_POST['password'];
$sql ="SELECT `username` FROM `info` WHERE `username`='".$uname."'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1)
{
 echo "username already taken";
}
else
{
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
echo '<div class ="stausmsg">'."email is not valid".'</div>';
}
else
{
$hash = md5( rand(0,1000) );
mysqli_query($conn,"INSERT INTO info (username, password, email, hash) VALUES(
'".$uname."', 
'".(md5($pass))."', 
'".$email."', 
'".$hash."') ") or die(mysqli_error($conn));
        
$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$uname.'
------------------------
 
Please click this link to activate your account:
http://localhost/511/verify1.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:himabindhu1231@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
echo '<div class ="statusmsg">'."check your mail the activation link has been sent to activate your account".'</div>';
}
}
}             
?>
<!-- stop PHP Code -->
         
        <!-- stop php code -->
     
        <!-- title and description -->   
        <h3>Signup Form</h3>
        <p>Please enter your name and email addres to create your account</p>
         
        <!-- start sign up form -->  
        <form action="" method="post">
            <div class ="loginbox">
            <b>Username:</b>
            <input type="text" name="username" value="" /><br><br>
            <b>Email:</b>
            <input type="text" name="email" value="" /><br><br>
            <b>Password:</b>
            <input type ="password" name ="password"/> <br><br>
            <input type="submit" class="btn btn-success" value="Sign up" /><br><br>
            <i>Already have account?<a href ="login.php">Sign in</a></i>
        </div>
        </form>
        <!-- end sign up form -->
         
    </div>
    <!-- end wrap div -->
</body>
</html>