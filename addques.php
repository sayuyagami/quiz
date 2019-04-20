<?php 
 $con=mysqli_connect("localhost","root","","quizdb");
 if(!$con){
	echo "failed connection";
}
?>
<html>
<head>
    <title>admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href="admin.css" rel="stylesheet">

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
                <a class="nav-link" href="htmlques.php"> Add <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ques.php"> Questions ? </a>
            </li>
            </ul>
        </div>
        <a style="margin-left:auto" class="btn btn-success" href="logout.php"> LOGOUT </a>
    </nav><br>
    <?php
        
         $questions=$_GET['ques'];
         $answers=$_GET['ans'];

         //select total number of questions
         $sql="select `qid` from $questions";
         $res=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
         $total=mysqli_num_rows($res);

         //select id of answers
         $sql="select `aid` from $answers";
         $res=mysqli_query($con,$sql) or die("failed".mysqli_error($con));
         $totalans=mysqli_num_rows($res);
    ?>
    <div class="container">
        <h1>Add Questions!!</h1><br>
        <?php
        //onclick submit
        if(isset($_POST['submit'])){
            $ques_num=$_POST['quesnum'];
            $ques_text=$_POST['questext'];
            $choice1=$_POST['op1'];
            $choice2=$_POST['op2'];
            $choice3=$_POST['op3'];
            $choice4=$_POST['op4'];
            $corr_ans=$_POST['corrans'];

            //insert data into questions table
            mysqli_query($con,"INSERT INTO `$questions`(`questions`, `ans_id`) VALUES ('$ques_text','$corr_ans')") or die("failed".mysqli_error($con));

            //insert data into answers table
            mysqli_query($con,"INSERT INTO `$answers`(`answers`, `ans_id`) VALUES ('$choice1','$ques_num')") or die("failed".mysqli_error($con));
            mysqli_query($con,"INSERT INTO `$answers`(`answers`, `ans_id`) VALUES ('$choice2','$ques_num')") or die("failed".mysqli_error($con));
            mysqli_query($con,"INSERT INTO `$answers`(`answers`, `ans_id`) VALUES ('$choice3','$ques_num')") or die("failed".mysqli_error($con));
            mysqli_query($con,"INSERT INTO `$answers`(`answers`, `ans_id`) VALUES ('$choice4','$ques_num')") or die("failed".mysqli_error($con));
        ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>Question added <strong>Successfully!!</strong>
        </div>
        <?php  
        }
        ?>  
        <form method="post" action="addques.php?ques=<?php echo $questions ?>&ans=<?php echo $answers?>" >
            Question number: <input style="border-radius: 2px" type="number" name="quesnum" value= <?php echo $total+1 ; ?> required/><br><br>
            <div class="box">
                Question ? <input style="border-radius: 2px;width:60%" type="text" name="questext" required/><br><br>
                option <?php echo $totalans+1 ; ?>: <input style="border-radius: 2px;width:60%" type="text" name="op1" required/><br><br>
                option <?php echo $totalans+2 ; ?>: <input style="border-radius: 2px;width:60%" type="text" name="op2" required/><br><br>
                option <?php echo $totalans+3 ; ?>: <input style="border-radius: 2px;width:60%" type="text" name="op3" required/><br><br>
                option <?php echo $totalans+4 ; ?>: <input style="border-radius: 2px;width:60%" type="text" name="op4" required/><br><br>
                correct option:<input style="border-radius: 2px" type="number" name="corrans" value="<?php echo $totalans+1 ; ?>" required/><br><br>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Question"/>
        </form>
    </div>
</body>
</html>