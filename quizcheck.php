<?php
    global $con,$score;
    include("funct.php");
    if(!isset($_SESSION['username']))
    {
       header("location:login.php");
    }else{
      include ("connect.php");
    }
 
    if(!isset($_SESSION['score'])){
       $_SESSION['score']=0;
    }

    if(!isset($_SESSION['count'])){
       $_SESSION['count']=0;
    }    

    if($_POST)
    {
      //question number
      $num=$_POST['number'];
      $uans=$_POST['quizcheck'];
      $quizname=$_POST['quizname'];
      $questions=$_POST['questions'];
      $answers=$_POST['answers'];
      $users=$_POST['users'];
      $next= $num+1;

      if(isset($_POST['quizcheck'])){
         $_SESSION['count']++;
      }

     $sql="select `qid` from $questions";
     $res=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
     $total=mysqli_num_rows($res);

     $q1="select * from `$questions` where `qid` = '$num' ";
     $res1=mysqli_query($con,$q1) or die("failed".mysqli_error($con));
     $rows=mysqli_fetch_array($res1);
     $dbans=$rows['ans_id'];
    }
 
  //comparing user answer
  if($dbans==$uans){
    //answer is correct
    $_SESSION['score']++;
  }
  
   if($num==$total){
      header("Location:final.php?score=".$_SESSION['score']."&count=".$_SESSION['count']."&usr=".$users."&ques=".$questions);
      exit();
    }else{
     header("Location:quiz.php?n=".$next."&quiz=".$quizname."&ques=".$questions."&ans=".$answers."&usr=".$users);
    }
?>