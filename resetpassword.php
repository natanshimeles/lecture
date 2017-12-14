<?php
session_start();
$p=$_GET["key"];
$_SESSION["key"]=$_GET["key"];







?>
<!doctype html>
<html lang="en">
  <head>
    <title>Reset password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="main" id="main">

    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-4 col-lg-4">
        </div>
        <div class="col-md-4 col-lg-4 first">
          
          
    <form  id="demo" name="reset" method="POST" action="resetnow.php" onsubmit="return validateform()">
  <div class="form-group">
    <label for="exampleInputEmail1">new Password</label>
    <input name="password1" type="password1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="password" required="">
   
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Verify Password</label>
    <input name="password2" type="password2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="password" required="">
   
  </div>
  
  <button type="submit" class="btn btn-primary">Reset</button>
  
</form>

</div>
<div class="col-md-4 col-lg-4">
  </div>

</div>
</div>
<script type="text/javascript" >
    function validateform(){
        var  password1 = document.forms["reset"]["password1"].value;
        var password2 =document.forms["reset"]["password2"].value;
        if(password1 != password2){
      alert("Pass words must be the same");
      return false;
}

}
  </script>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script/script.js"></script>
  </body>
</html>