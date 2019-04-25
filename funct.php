<?php 
	session_start();

	// connect to database
	 $conn=mysqli_connect("localhost", "bindhu","@nime123","login") or die(mysqli_error($conn)); // Connect to database server(localhost) with 
	
    // call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if login_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	// REGISTER USER
	function register(){
		global $conn, $errors;
	
        // Select registrations database.
 
    	if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
			$uname = $_POST['username'];
			$email = $_POST['email'];
	    	$pass =md5($_POST['password']);
			$sql ="SELECT `username` FROM `info` WHERE `username`='".$uname."'";
			$result=mysqli_query($conn,$sql);
			$num=mysqli_num_rows($result);
			//echo $num;
		    if($num==1)
			{
             ?>
	 	      <div class="alert alert-success alert-dismissible">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
  				Username already taken.
			  </div>
 		      <?php
			}else{
			     if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				 {  ?>
				     <div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  Invalid email
					 </div>
					<?php 
                 }
                 else
                 {
				   $code = rand(0,10000);
				   $hash = md5( rand(0,1000) );	 
                   mysqli_query($conn,"INSERT INTO info (username, password, email,hash,code,type) VALUES('".$uname."', '".$pass."','".$email."','".$hash."','".$code."','user') ") or die(mysqli_error($conn));
				 }
		      ?>
	          <div class="alert alert-success">
	        	<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>your have registered successfully !!</strong><a href="login.php" class="alert-link"> login now </a>.
			  </div>
              <?php
       	    }
    	}
    }
    
	// LOGIN USER
	function login(){
	 global $conn,$username,$password;
	 
		if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])){
   			 $username = $_POST['username']; // Turn our post into a local variable
    	     $password = md5($_POST['password']); // Turn our post into a local variable
   			 $sql ="SELECT * FROM `info` WHERE `username`='$username' AND `password`='$password'";
             $results=mysqli_query($conn,$sql);
			 $rows =mysqli_fetch_array($results);
			//$query = "SELECT * FROM info WHERE username='$username' AND password='$password' ";
			if($rows['username']==$username && $rows['password']==$password) {
			    if ($rows['type'] == 'admin') {
					$_SESSION['type'] = admin;
			        $_SESSION['username']=$username;
					header('location: admin.php');		  
			          
			    }else if($rows['type'] =='user'){
 					$_SESSION['username']=$username;
					header('location: home.php');
		        }
		    }else{
			 	?>
				<div class="alert alert-success alert-dismissible fade show">
    			<button type="button" class="close" data-dismiss="alert">&times;</button>
    			<strong> invalid password !!</strong>
  				</div>
		        <?php    
		    }
        }
    }
?>