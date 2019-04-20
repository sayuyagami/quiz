<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="container">
 <?php
include('funct.php');
if(!isset($_SESSION['username']))
{
 header("location:login.php");
}
 $con=mysqli_connect('localhost','root','','quizdb');

 //mysqli_select_db($con,'quizdb');
?>

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

 <br><h1 style="color:#FFF" class="card-head text-center card bg-dark">Results</h1><br>
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

        <br><a style="margin-left:5%" class="btn btn-warning" href="home.php">Back to the Quiz</a><br>
		<br><br><a style="margin-left:70%" class="btn btn-success" href="logout.php" > LOGOUT </a><br><br>
</html>