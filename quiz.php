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

if(isset($_POST['submit'])){

    if($_POST['submit'] =="submit"){
                   

                    $gender ="'".$_POST['gender']."'";
                    $age="'".$_POST['age']."'";
                    $height ="'".$_POST['height']."'";
                    $you ="'".$_POST['you']."'";
                    $bodyShape ="'".$_POST['bodyShape']."'";
                    $sColor ="'".$_POST['sColor']."'";
                    $eColor ="'".$_POST['eColor']."'";
                    $style ="'".$_POST['style']."'";
                    $desc ="'".$_POST['desc']."'";
                   
                     
                    $q = "INSERT INTO test(gender, age, height, youAre, bodyShape, skinColor, eyeColor,Style, Description,user_id) VALUES ( $gender, $age,$height, $you, $bodyShape, $sColor, $eColor, $style, $desc,$useridauth)";
                         
                        $conn->query($q);
                    $sq="UPDATE `advisor`.`tbl_user` SET `quiz` = '1' WHERE `tbl_user`.`id` =".$useridauth;
                     $conn->query($sq);
                     print "<div class='alert alert-success' role='alert'> <strong>Success!</strong> You have successfully taken the quiz. <a href='Advisors.html' class='alert-link'>Choose Advisor now</a></div>";
             

                
    }



}




$sql = "SELECT  * FROM tbl_user where id='$useridauth' ";
$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {
 
        $quiz=  $row["quiz"];

    }
       
        if($quiz==1){

            header("Location: choseadvisor.php");
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
   <form action="'. $_SERVER['PHP_SELF'] .'" method="POST">
    <div class="row">
        <div class="col-4"><hr></div>
            <div class="col-4 text-center" style="font-size: 20px;">TELL US ABOUT YOU</div>
            <div class="col-4"><hr></div>
            <br><br>
            <div class="col-sm-12">
                <h6 class="text-secondary mt-3">
                    Gender
                </h6> 
                <select class="form-control" name="gender" id="gender" required="">
                    <option>Male</option>
                    <option>Female</option>
                </select> 
            </div>
            
            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                Age
            </h6> 
                <input type="number" name="age" value="age" class="form-control" required="">
            </div>
            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                Height(cm)
            </h6> 
                <input type="number" name="height" value="height" class="form-control" required="">
            </div>
            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                You Are
            </h6> 
                <select class="form-control" name="you" id="you">
                    <option>Thin</option>
                    <option>Skinny</option>
                    <option>Curvey</option>
                    <option>Chubby</option>
                </select> 
            </div>

            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                Body Shape
            </h6> 
                <select class="form-control" name="bodyShape">
                    <option>Traingle</option>
                    <option>Pears</option>
                    <option>Rectangle</option>
                    <option>Hourglass</option>
                </select> 
            </div>

            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                Skin Color
            </h6>  
                <select class="form-control" name="sColor">
                    <option>Light</option>
                    <option>Bronze</option>
                    <option>Neutral</option>
                    <option>Dark</option>
                </select> 
            </div>

            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                Eye Color
            </h6>  
                <select class="form-control" name="eColor">
                    <option>Brown</option>
                    <option>Green</option>
                    <option>Blue</option>
                    <option>Dark brown</option>
                </select> 
            </div>
            
            <div class="col-sm-12"><h6 class="text-secondary mt-3">
                Style You Prefer:
            </h6>  
                <select class="form-control" name="style">
                    <option>Simple</option>
                    <option>Elegant</option>
                    <option>Sport</option>
                    <option>Any</option>
                </select> 
            </div>

            <div class="col-sm-12"><h6 class="text-secondary mt-3" >
                A description on what would you like:
            </h6>  
                <textarea required rows="8" class="form-control" name="desc"> </textarea>
            </div>

            
            <div class="col-sm-12"><p class="text-secondary">
                <input type="submit" name="submit" value="submit" style="background-color: #72A6E1;" class="btn btn-default mb-3 mt-3">
            </div>
    </form>

            
   </div>


</body>
</html>


            ';

        }
}


?>