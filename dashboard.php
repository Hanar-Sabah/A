<?php

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
    		background-color: #fff;
    	}
    	.nav-link{
    		color: #72A6E1;
    	}
    	
    </style>
</head>

<body> 

<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center mb-3">
  <a class="navbar-brand m-auto" href="index.php"><img src="images/LOGO.png" width="50px"></a>
</nav>

<div class="container">
  <div>
  <h6  class="well text-left mb-5 bg-light p-5 pl-2">
    Welcome back, 

    <?php
$sql = "SELECT  * FROM tbl_user where id=$useridauth ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 
        $name=   $row["full_name"] ;
       echo $name;
}}
    ?>

    <form class=" float-right" method="POST" action="signout.php">
      <button type="submit" class="btn btn-secondary float-right" name="signout" >Sign Out</button>
    </form>
  </h6>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Test Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Advisor Feedback</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Account Info</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
               
  <table class="table  ">
    <thead>
      <tr>
        <th>Gender</th>
        <th>Age</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Body shape</th>
        <th>Skin Color</th>
        <th>Eye color</th>
        <th>style</th>
        <th>Description</th>
        
      
      </tr>
  </thead>
  <tbody>
    <tr>
   <?php
$sql = "SELECT  * FROM test where user_id=$useridauth ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 
           
       echo "<td>". $row["gender"] ."</td>"; 
       echo "<td>". $row["age"] ."</td>";
       echo "<td>". $row["height"] ."</td>";
       echo "<td>". $row["youAre"] ."</td>";
       echo "<td>". $row["bodyShape"] ."</td>";
        echo "<td>". $row["skinColor"] ."</td>";
        echo "<td>". $row["eyeColor"] ."</td>";
        echo "<td>". $row["Style"] ."</td>";
        echo "<td>". $row["Description"] ."</td>";
}}
    ?>
</tr>
  </tbody>
  </table>
    </div>

    <div id="menu1" class="container tab-pane fade"><br>
      <table class="table  ">
    <thead>
      <tr>
        <th>Avisor's Comment</th>
      </tr>
  </thead>
  <tbody>
    <?php
$sql = "SELECT  * FROM advisorComment where user_id=$useridauth ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  
           
       echo "<td>". $row["comment"] ."</td>"; 
     
}}
    ?>
    </tbody>
   </table>
  </div>

    <div id="menu2" class="container tab-pane fade"><br>
      <table class="table  ">
    <thead>
      <tr>
 
        <th>full name</th>
        <th>User name</th>
        <th>Email</th>
      </tr>
  </thead>
  <tbody>
    <tr>
    <?php
$sql = "SELECT  * FROM tbl_user where id=$useridauth ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  
           
       echo "<td>". $row["full_name"] ."</td>"; 
        echo "<td>". $row["username"] ."</td>"; 
         echo "<td>". $row["email"] ."</td>"; 
     
}}
    ?>
</tr>
  </tbody>
  </table>
    </div>
  </div>
 


  
</div>
</body>
</html>
