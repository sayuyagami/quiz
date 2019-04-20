<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
</head>
<body>
  <div class="se-pre-con" style="display: none;"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i style="color:#00ff00;font-size:30px">Q</i><i style="color:#00ffff">uiz</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="about.php">About</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="login.php">login</a>
       </li>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="registration.php">Sign up</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="contact.php">Contact</a>
       </li>
     </ul>
   </div>
 </nav>

  <div id="demo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <img src="images/quiz.jpeg" alt="quiz" width="1100" height="500">
        <div class="carousel-caption">
          <h3><b><i style="color:#00ff00">Q</i><i style="font-size: 30px;color: #00ffff">uiz</i></b></h3>
          <p>it's time to test your Knowledge</p>
        </div>   
    </div>  
  </div>
  
    <div class="box">
      <h3>Subscribe Here...!!</h3>
      <input type="email" name="email" style="width: 80%;height:38px;border-radius: 5px;margin: 10px" placeholder="Email address...." />
      <button type="submit" class="btn btn-danger">Subscribe</button>
    </div>
  <div style="background-color:#fff" class="container">
    <h2>About us</h2>

    <p>Test your skills by attempting the tests we are providing they will help you to know how much do you know about the subject.We will provide the percentage of your particular subjects in a graphical way.Trained students are always welcome to test your knowlege.Try your best to score more.Know more about the subjects by attempting the test,eventhough your not goot at that subject it helps you to gain some knowlege.</p>

    <p>Test your skills by attempting the tests we are providing they will help you to know how much do you know about the subject.We will provide the percentage of your particular subjects in a graphical way.Trained students are always welcome to test your knowlege.Try your best to score more.Know more about the subjects by attempting the test,eventhough your not goot at that subject it helps you to gain some knowlege.</p>

    <p>We are always here and willing to help !! Contact us by using the given link <u><a href="contact.php">contact us</a></u></p>
    <img src="images/test.png" class="img-fluid" alt="Responsive image">

    <p>Hard skills, also called technical skills, are any skills relating to a specific task or situation. It involves both understanding and proficiency in such specific activity that involves methods, processes, procedures, or techniques.[5] These skills are easily quantifiable unlike soft skills, which are related to one's personality.[6] These are also skills that can be or have been tested and may entail some professional, technical, or academic qualification.</p>

    <img src="images/bulb.png" class="float-left" class="img-fluid" style="width:250px;height: 300px" alt="Responsive image">
    <p>
      <ul>
        <li>understanding ourselves and moderating our responses</li>
        <li>talking effectively and empathizing accurately</li>
        <li>building relationships of trust, respect and productive interactions.</li>
      </ul>
      <p>Skills are the expertise or talent needed in order to do a job or task. Job skills allow you to do a particular job and life skills help you through everyday tasks. There are many different types of skills that can help you succeed at all aspects of your life whether it's school, work, or even a sport or hobby.

      Skills are what makes you confident and independent in life and are essential for success. It might take determination and practice, but almost any skill can be learned or improved. Set yourself realistic expectations and goals, get organized and get learning.</p>
    </p>
    
    <p>If your interseted to take the tests please register your account.The quizes we are providing will definitely help you.I hope you may get grip on your skills.Would you like to get more updates from our website you can subscribe to our site.We will notify you about every updates of our website.</p><br>
    
    <h4 style="text-align: center">If you had an account login now and test your skills or else you can register for free and Get Started !!!</h4><br>
    <center>
    <b><a class = "sqr" href="login.php">Login</a></b>
    <b><a class ="sqr" style="background-color:#c0c0c0" href="registration.php">Sign up</a></b>
    </center>
  </div><br>
  <div class="container">
    <form action=" " method="post">
      <div style="margin:5px">
        <input type="text" name="comments" style="font-family:sans-serif;font-size:1.2em;padding:2px;width:100%;height: 100px" placeholder=" publise your comment....." value="" required />
      </div><br>
      <input style="margin: 1px auto" type="submit" class="btn btn-primary" name="comment-btn" value="Send"><br><br>
    </form>
  
    <?php 
     include ("connect.php");
        
         $query="select * from comment";
         $q1=mysqli_query($con,$query);
         ?>
         
         <p><strong>Comments:</strong></p>
         <?php
          
           if (mysqli_num_rows($q1) > 0) {
               // output data of each row
           	   while ( $row = mysqli_fetch_assoc($q1)) {
               ?>
           	   <div style="padding:10px" class="card bg-light text-dark"> 
                   <i class="fa fa-user icon"></i>&nbsp;<b><?php echo $row['name'] ?></b>          
                   <i><?php echo $row['comment'] ?></i>
                   <i style="margin-left:auto" class="fa fa-heart icon"></i>
                </div><br>
                <?php
               }
            } else {
              echo "0 results";
            }    
    ?>
    <?php 
      include ("connect.php");
      if(isset($_POST['comment-btn']) && !empty($_POST['comment-btn']) && isset($_POST['comments']) && !empty($_POST['comments'])){
         $comm=$_POST['comments'];
         $sql="INSERT INTO `comment`(`name`,`comment`) VALUES ('user','$comm')";
         $q=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
         
         $query="select * from comment";
         $q1=mysqli_query($con,$query);
         $num=mysqli_num_rows($q1);

         $query="select * from comment where id = $num";
         $q2=mysqli_query($con,$query);
         
         

             // output data of each row
         	    while($id = mysqli_fetch_assoc($q2)) {
                ?>
           	   <div style="padding:10px" class="card bg-light text-dark"> 
                   <i class="fa fa-user icon"></i>&nbsp;<b><?php echo $id['name']; ?></b>          
                   <i><?php echo $id['comment']; ?></i>
                   <i style="margin-left:auto" class="fa fa-heart icon"></i>
                </div><br>
                <?php
            }
        }    
   ?>
  </div> 
  <!--<a href="#" id="totop" style="display:block;"><span id="totophover" style="opacity: 0"></span>To top</a>-->
</body>
<footer style="margin-top:50px" class="w3-center w3-black w3-padding-32">
  <i style="color:#c0c0c0">supported by &nbsp;</i><a href="#" class="fa fa-facebook"></a>&nbsp;&nbsp;
  <a href="#" class="fa fa-twitter"></a>&nbsp;&nbsp;
  <a href="#" class="fa fa-google"></a>&nbsp;&nbsp;
  <a href="#" class="fa fa-instagram"></a><br> 
  <i style="color:#c0c0c0">&copy; All rights are reserved | Design by @nonymous_.1</i>
</footer>
</html>