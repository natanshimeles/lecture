<?php
session_start();
require "checkapplied.php";
//header("Location: login.html");
require 'Conn.php';




if(empty($_SESSION["name"])){

  header("Location: login.html");
}

$email =$_SESSION["name"];
$query= "select * from appliers where email ='$email'";
$result=$conn->query($query);


if($result->num_rows > 0){

    while($account = $result->fetch_assoc()){
      
     $R= $account["result"] ;

      }
    }

    if ($R==0) {
      $RESULT="result will be out soon";
      
    }
    else if ($R==1){
        $RESULT="accepted";

    }
    else{
        $RESULT="declined ";

    }





?>


<!doctype html>
<html lang="en">
  <head>
    <title>Welcome To Lecture Program</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="main">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-4  col-lg-2">
        </div>
        <div class="col-md-4  col-lg-8">
        	<br><br><br><br>
        	<h3 style="text-align: center;">RESULT</h3> 
        	<p style="text-align: center;"><?php echo $RESULT;   ?></p>

        </div>
          <div class="col-md-4 col-lg-2">
             <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
          	
          </div>
      
  </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>'
