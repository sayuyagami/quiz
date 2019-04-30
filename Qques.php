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
        <li class="nav-item active">
          <a class="nav-link" href="Qques.php"> Quiz questions <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ques.php"> Questions ? </a>
        </li>
      </ul>
    </div>
    <a style="margin-left:auto" class="btn btn-success" href="logout.php"> LOGOUT </a>
  </nav><br>

  <div class="container">
    <?php
      $quizname=$_GET['quiz'];
      $questions=$_GET['ques'];
      $answers=$_GET['ans'];
    ?>
    <h2><?php echo $quizname; ?>Questions</h2>
    <?php
         include ("connect.php");
         //session_start();
         $sql="select `qid` from $questions";
         $res=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
         $total=mysqli_num_rows($res);
    ?>

    <i class="box"><?php echo " Questions ".$total; ?></i><br><br>
    <?php
      for($num=1;$num<=$total;$num++){
       //select questions from table
       $q="select * from `$questions` where `qid` = '$num' ";
       $query=mysqli_query($con,$q) or die("failed".mysqli_error($con));
       while($rows=mysqli_fetch_array($query))
       {
         $cans=$rows['ans_id'];   
    ?>
    <div class="card bg-light text-dark">
      <h4 class="card-header"><?php echo $rows['questions']; ?> </h4> 
      <?php
       //select correctanswers from table
       $q="select * from `$answers` where `aid` = $cans ";
       $query=mysqli_query($con,$q);
       while($rows=mysqli_fetch_array($query)){
      ?>
      <div class="card bg-default text-dark">
        <div style="font-size:15px;font-family:tahoma" class="card-body">
          A: &nbsp;<?php echo $rows['answers'];?><br><br>
        </div>
      </div>
      <?php
         }
        }
       }
      ?>
    </div>
  </div>
</body>      
</html>