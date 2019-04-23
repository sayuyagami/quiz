<?php
include('funct.php');
if(!isset($_SESSION['type']) && empty($_SESSION['type']))
{
 header("location:login.php");
}else{
  $uname=$_SESSION['username'];
  include ("connect.php");
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
 <div style="background-color:#fff" class="container">
    <div class = "col-md-8 m-auto">
        <?php $quizname=$_GET['quiz']; ?>
        <br><h1 class="text-center text-primary"><?php echo $quizname; ?> QUIZ </h1><br><br><br>

        <?php
         //session_start();
         $questions=$_GET['ques'];
         $answers=$_GET['ans'];
         $users=$_GET['usr'];
         $sql="select `qid` from $questions";
         $res=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
         $total=mysqli_num_rows($res);
         $num=$_GET['n']; 
        ?>

        <i class="box"><?php echo " Questions ".$num."/".$total ; ?>&nbsp;</i>
        <?php
         global $con;

            //select questions from table
            $q="select * from `$questions` where `qid` = '$num' ";
            $query=mysqli_query($con,$q) or die("failed".mysqli_error($con));
            while($rows=mysqli_fetch_array($query))
            {   
        ?>
                <div class="card bg-dark text-light">
                    <h4 class="card-header"><?php echo $rows['questions']; ?> </h4> 
                    <form action="quizcheck.php" method="post">
                <?php
                    //select answers from table
                 $q="select * from `$answers` where `ans_id` = '$num' ";
                 $query=mysqli_query($con,$q);
                while($rows=mysqli_fetch_array($query)){
                ?>
                    <div  style="background-color: #fdf6f6f2"  class="card text-dark">
                     <div style="font-size:15px;font-family:tahoma" class="card-body">
                            <input type="radio" name="quizcheck" value="<?php echo $rows['aid']; ?>" />
                            <?php echo $rows['answers'];?>
                     </div>
                    </div>
                    <?php
                }
            }
                    ?>
                </div><br>
                 <div style="margin-left:80%"><input type="submit" class="btn btn-success" value="Next"></div><br><br> 
                 <input type="hidden" name="number" value="<?php echo $num; ?>"/>
                 <input type="hidden" name="quizname" value="<?php echo $quizname; ?>"/>
                 <input type="hidden" name="questions" value="<?php echo $questions; ?>"/>
                 <input type="hidden" name="answers" value="<?php echo $answers; ?>"/>
                 <input type="hidden" name="users" value="<?php echo $users; ?>"/>
                 </form>
  </div>
 </div>
</body>
</html>