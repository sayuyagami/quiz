<html>
<head>
	<title>admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" href="admin.css" rel="stylesheet">
	<script>
		function openNav() {
  			document.getElementById("mySidepanel").style.width = "250px";
		}

		function closeNav() {
  			document.getElementById("mySidepanel").style.width = "0";
		}
	</script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"><i style="font-size: 40px;color:#00ff00"> Q </i></a>
  		<button class="openbtn" onclick="openNav()"> ☰ </button><a  href="admin.php" class="navbar-brand"> &nbsp;Results </a>

  		<ul class="navbar-nav">
  			<li class="nav-item">
  				<a class="nav-link" href="admin.php"><i class="fa fa-fw fa-home">Home</i></a>
  			</li>
  		</ul>	
  		<a style="margin-left:auto" class="btn btn-success" href="logout.php"> LOGOUT </a>
	</nav>

	<div id="mySidepanel" class="sidepanel">
  		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  		<a href="results.php?quiz=HTML&usr=users">HTML</a>
  		<a href="results.php?quiz=CSS&usr=cssusers">CSS</a>
  		<a href="results.php?quiz=PHP&usr=phpusers">PHP</a>
  		<a href="results.php?quiz=JavaScript&usr=jsusers">JS</a>
	</div> 

	<div class="container">
        
        <?php 
          $quizname=$_GET['quiz'];
          $users=$_GET['usr']; 
        ?>
		<br><h2><?php echo $quizname; ?> Quiz Results</h2><br>
		<?php
 		$con=mysqli_connect('localhost','root');
 		mysqli_select_db($con,'quizdb');
 		$sql ="SELECT * FROM $users";
 		$query=mysqli_query($con,$sql);
 		?>
 		<table class="table table-striped">
			<thead>
				<tr>
					<th>s.no</th>
					<th>username</th>
					<th>total questions</th>
					<th>Score</th>
				</tr>
			</thead>
 			<?php	

 			if (mysqli_num_rows($query) > 0) {
    		// output data of each row
    			while($row = mysqli_fetch_assoc($query)) {
 				?>
					<tbody>
	    				<tr>
	        				<td><?php echo $row['id'];?></td>
	        				<td><?php echo $row['username'];?></td>
	        				<td><?php echo $row['totalques'];?></td>
	        				<td><?php echo $row['answerscorrect'];?></td>
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