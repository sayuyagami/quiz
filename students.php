<?php
include('funct.php');
if(!isset($_SESSION['username']) && !isset($_SESSION['type']))
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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
          <a class="nav-link" href="students.php"><i class="fa fa-fw fa-user"></i> Students <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           Results
          </a>

          <div class="dropdown-menu">
            <a class="dropdown-item" href="results.php?quiz=HTML&usr=users">HTML</a>
            <a class="dropdown-item" href="results.php?quiz=CSS&usr=cssusers">CSS</a>
            <a class="dropdown-item" href="results.php?quiz=PHP&usr=phpusers">PHP</a>
            <a class="dropdown-item" href="results.php?quiz=JavaScript&usr=jsusers">JavaScript</a>
          </div>  
        </li>

        <li class="nav-item">
          <a class="nav-link" href="ques.php"> Questions ? </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feed.php"> Feedback </a>
        </li>
      </ul>
    </div>
    <a style="margin-left:auto" class="btn btn-success" href="logout.php"> LOGOUT </a>
  </nav><br>
  <div class="container">
    <h3>Logged in users</h3><br>
    <?php 
     //connect to login database

     $conn=mysqli_connect("localhost", "bindhu","@nime123","login") or die(mysqli_error($conn));
     $query="SELECT * FROM `info`";
     $result=mysqli_query($conn,$query);
    ?>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>s.no</th>
          <th>username</th>
          <th>Tests taken</th>
        </tr>
      </thead>
      <?php 

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
        ?>
          <tbody>
              <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td>0</td>
              </tr>
          </tbody>  
          <?php    
          }
      } else {
            echo "0 results";
        }
      ?>
    </table>
  </div>  
</body>
</html>