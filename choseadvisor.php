
<?php

//if the cookie is not set, take me to login page
if(!isset($_COOKIE["user_auth"])) {
    header("Location: login.php"); 
    exit();
}
else{


	$useridauth= $_COOKIE["user_auth"];
  
      $servername = "127.0.0.1";
      $username = "root";
      $password = "1111";
      $dbname = "advisor";
      $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['advisor'])){

	if($_POST['advisor'] ==1){
		$q = "INSERT INTO advising(user_id, advisor_id) VALUES ( $useridauth,1)";


       $conn->query($q);

         $sq="UPDATE `advisor`.`tbl_user` SET `advisor` = '1' WHERE `tbl_user`.`id` =".$useridauth;
                     $conn->query($sq);
       header("Location: index.php");exit(); 
	}
	elseif($_POST['advisor'] ==2){
		$q = "INSERT INTO advising(user_id, advisor_id) VALUES ( $useridauth,2)";
       $conn->query($q);
 $sq="UPDATE `advisor`.`tbl_user` SET `advisor` = '1' WHERE `tbl_user`.`id` =".$useridauth;
                     $conn->query($sq);

       header("Location: index.php");
       exit(); 
	}
}




$sql = "SELECT  * FROM tbl_user where id='$useridauth' ";
$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {
 
        $advisor=  $row["advisor"];

    }

if($advisor==1){

            header("Location: index.php");
            exit();
        }
        else{
        	  echo'

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

  
<body> <nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center mb-3">
    <a class="navbar-brand m-auto" href="index.html"><img src="images/LOGO.png" width="50px"></a>
</nav>

  <div class="container" style="max-width: 900px;">  
          <h4>
		 ADVISORS<hr>
	</h4>	
	<p class="Ad1">CHOOSE YOUR ADVISOR </p>
	
  <form class="row" method="POST" action="'. $_SERVER['PHP_SELF'] .'">
    <div class="col-md-3 offset-md-3">
      <div class="card">
         <img class="card-img-top" src="images/aq.jpg">
         <div class="card-body">
          <div class="card-title">Kaylie - 32 Years Old</div>
          <div class="card-text">Kailey has been designing since she was 16. She has masters in fashion design that she achieved in Canada.</div>
          <br>
          <button type="submit" name="advisor" value="1" class="btn btn-primary" >
          Choose
          </button>
         </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
         <img class="card-img-top" src="images/a2.jpg" style="width: 100%;">
         <div class="card-body">
          <div class="card-title">Adam - 28 Years Old</div>
          <div class="card-text">Adam has been designing since he was 18. He has masters in fashion design that she achieved in UK.</div>
          <br>
         <button type="submit" name="advisor" value="2" class="btn btn-primary" >
          Choose
        </button>
         </div>
      </div>
    </div>

      
    
  </form>  
   </div>

	<footer>
	<div class="container">
		<hr>
		<div class="col-md-12" align="center">
			<p>Contact</p>
			<p>phone call: 0964(0) 7703683881</p>
			<p>Email: hanar.sabah@auis.edu.krd</p>
			<i class="fab fa-facebook-square"></i>
			<i class="fab fa-twitter-square"></i>
			<i class="fab fa-instagram"></i>
		</div>
		

	</div>
</footer>
</body>
</html>


            ';
        }






}


	?>