

<?php



//check if user logged in or not 
if(!isset($_COOKIE["user_auth"])) {
    echo'<html lang="en">
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
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center mb-3">
  
  <a class="navbar-brand m-auto" href="index.php"><img src="images/LOGO.png" width="50px"></a>
  
</nav>
<div class="container" style="max-width: 300px; border: solid #ddd 1px; padding: 20px;">

 <h2 class="text-center">LOGIN</h2>
  <hr>


<form method="post" action="'. $_SERVER['PHP_SELF'] .'">
  

   <h6>username</h6>
  <input type="text" name="name" class="form-control"><br>
  <h6>password</h6>
 <input type="password" name="pass" class="form-control"><br>

   <input type="submit" name="submit" value="Login" class="btn btn-primary">

   or <a href="registeration.php">create new account</a>


</form>
</div>

</body>
</html>
    ';



// getting login info and authentication
if(isset($_POST['submit']))

{
  
      $servername = "127.0.0.1";
      $username = "root";
      $password = "1111";
      $dbname = "advisor";

    
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $pass ="'".$_POST['pass']."'";
 $name =$_POST['name'];

$sql = "SELECT  password FROM tbl_user where username='$name' ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 
        $pwd= "'". $row["password"]."'";
       

 if($pwd==$pass){

        $sql = "SELECT  * FROM tbl_user where username='$name' ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
               $userid=$row["id"];
                $quiz=$row["quiz"];
                $advisor=$row["advisor"];

        }

        $cookie_name = "user_auth";
        $cookie_value = $userid;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");
        
        if($quiz==0){
          header("Location: quiz.php");
          exit();

        }

      elseif ($quiz==1 && $advisor==0) {
        header("Location: choseadvisor.php");
        exit();

      }

      elseif($quiz==1 && $advisor==1){
         header("Location: index.php");
         exit();

      }
          
           } 

else {
 print "<div class='alert alert-warning' role='alert'> <strong>Wrong password! </strong> you entered .".$pass." the real pw is".$pwd." </div>";
}

    }
} 
else {
 print "<div class='alert alert-warning' role='alert'> <strong>Wrong Username! </strong> Try again. </div>";
}
}

} else {
   header("Location: quiz.php"); 
    exit();
}
?>
