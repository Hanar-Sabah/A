


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--css reference-->
    <link href="static/css/styles.css" rel="stylesheet" type="text/css">

    <!--bootstrap reference-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700" rel="stylesheet">


    <style type=text/css>
    	body{
    		background-color: #EEEEEE;
    	}
    	.hdrs{
    		color: #72A6E1;
    	}
    	
    </style>
</head>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center mb-3">
  
  <a class="navbar-brand m-auto" href="index.html"><img src="images/LOGO.png" width="50px"></a>
  
</nav>
<body>   

   	<div class="container" style="max-width: 600px;">
  <h2 class="text-center">CREATE ACCOUNT</h2>
  <hr>
<?php


if(isset($_POST['register'])){

		$servername = "127.0.0.1";
			$username = "root";
			$password = "1111";
			$dbname = "advisor";

	if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){
		
			// New Account 
				if($_POST['register'] =="register"){
					

					$fullname ="'".$_POST['fname']."'";
					$uname ="'".$_POST['uname']."'";
					$email ="'".$_POST['email']."'";
					$password ="'".$_POST['pwd']."'";
					  
					 
					$q = "INSERT INTO tbl_user( full_name, username, email, password) VALUES ( $fullname, $uname, $email, $password)";
					mysqli_query($dbc, $q);

					 print "<div class='alert alert-success' role='alert'> <strong>Success!</strong> You successfully registered. <a href='login.php' class='alert-link'>login</a></div>";
			 

				}
	}



}
else{
	echo ' <form method="POST" action="'. $_SERVER['PHP_SELF'] .'" enctype="multipart/form-data">

  	<div class="form-group" id="form">
      <label for="fname">Full Name</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter your full name" name="fname" required>
    </div>
    <div class="form-group">
      <label for="uname">User Name</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter your user name" name="uname" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
   
    	
    <button type="submit" value="register" name="register" class="btn btn-primary mb-4">Register</button>
    <hr/>
    <p>Already have an account? <a href="login.php">login</a></p>
  	</form>';
}		
	

?>

 
</div>

<script src="static/css/scripts.js"></script>
</body>
</html>

