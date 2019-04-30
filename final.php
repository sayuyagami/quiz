<?php
include('funct.php');
if(!isset($_SESSION['username']))
{
 header("location:login.php");
}else{
 include("connect.php");
} 
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="icon" href="images/logo.png" type="image/icon">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i style="font-size: 40px;color:#00ff00"> Q </i></a>

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="home.php"><i class="fa fa-fw fa-home"></i> Home </a>
        </li>
      </ul>
    </div>
    <a style="margin-left:auto" class="btn btn-success" href="logout.php"> LOGOUT </a>
</nav><br><br>

<div class="container">

<?php
 $questions=$_GET['ques'];
 $users=$_GET['usr'];
 $uname=$_SESSION['username'];
 $sql ="SELECT `username` FROM `$users` WHERE `username`='".$uname."'";
 $results=mysqli_query($con,$sql);
 $num=mysqli_num_rows($results);
 $sql="select `qid` from $questions";
 $res=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
 $total=mysqli_num_rows($res);
?>

 <br><h1 style="color:#fff;background-color:#000" class="card-head text-center">Result</h1><br>
 <em class="card-head text-center card bg-light"><?php echo "<h4> out of ".$total." ,you have attempted ".$_GET['count']." questions</h4>";?></em>
    <h4 style="height:10%;padding:20px" class='card bg-primary text-center text-white'><?php echo "<div> your total score is ".$_GET['score']."</div>"; ?></h4>  
<?php
  $score=$_GET['score'];
 if($num==1)
 {
     mysqli_query($con,"UPDATE `$users` SET `totalques` = '$total', `answerscorrect` = '$score' WHERE username ='".$uname."'");
 }else{
 $finalresult="INSERT INTO `$users`(`username`, `totalques`, `answerscorrect`) VALUES ('$uname','$total','$score')";
 $queryresult=mysqli_query($con,$finalresult);
 }
 unset($_SESSION['score']);
 unset($_SESSION['count']);
 ?>
</div>
</head>
</html>
