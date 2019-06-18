
<?php

if(isset($_POST['signout']))

{
  $cookie_name = "user_auth";
   setcookie($cookie_name, '', time() - 1, "/");
}

if(isset($_POST['signoutAd']))

{
  $cookie_name = "ad_auth";
   setcookie($cookie_name, '', time() - 1, "/");
}
?>

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
    
  <div class="alert alert-warning" >
    <strong>You have signe out! <a href="index.php">back to website </a>now</strong>
  </div>    
  
    
      
        
    </body>
</html>
