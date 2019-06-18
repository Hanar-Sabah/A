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

<!--banner with logo-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center mb-3">
    <a class="navbar-brand m-auto" href="index.php"><img src="images/LOGO.png" width="50px"></a>
</nav>

<body>   
	<h4>TALK TO US</h4>
	<hr class="hln2">
	<p class="Ad1">WE DO LOVE YOUR FEEDBACK</p>
	  <?php

    if(isset($_POST['submit'])){

       		 $servername = "127.0.0.1";
            $username = "root";
            $password = "1111";
            $dbname = "advisor";

    if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){
        
            // New Account 
                if($_POST['submit'] =="submit"){
                   

                    $name="'".$_POST['nm']."'";
                    $email="'".$_POST['eml']."'";
                    $subject ="'".$_POST['sbjct']."'";
                    $sugg ="'".$_POST['sugg']."'";
                    
                   
                      
                     
                    $q = "INSERT INTO feedback(name, email, subject, suggestion) VALUES ($name, $email, $subject, $sugg)";
                        	mysqli_query($dbc, $q);

                     print "<div class='alert alert-success' role='alert'> <strong>Success!</strong> You have successfully sent us your suggestion. <a href='index.html' class='alert-link'>go back to the website</a></div>";
             

                }
    }



}

else{
	echo '<div class="container" style="max-width: 500px;" align="center">
		<form action="feedback.php" method="POST">
			<div class="row">
				<div class="col-sm-12">
					<p>Name</p>
				</div>
				<div class="col-sm-12">
					<input type="text" name="nm">
				</div>
				<div class="col-sm-12">
					Email
				</div>
				<div class="col-sm-12">
					<input type="email" name="eml">
				</div>

				<div class="col-sm-12">
					Subject
				</div>
				<div class="col-sm-12">
					<input type="text" name="sbjct">
				</div>

				<div class="col-sm-12">
					Your Suggestion
				</div>
				<div class="col-sm-12">
					<textarea cols="50" rows="8" name="sugg"></textarea>
				</div>
			</div>
			<div class="col-sm-12 mb-3">
			<input type="submit" name="submit" value="submit" style="background-color: #72A6E1;"></div>
		
	</form>';
}
?>
	
	</div>
</body>
</html>
	