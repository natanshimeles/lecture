<?php

$root =$_SERVER['DOCUMENT_ROOT'];
require "$root/program/Conn.php";
$create=fopen("index.txt", "r");
$name= fgets($create);
fclose($create);
$profile = "select * from person where firstname='$name'";
$resultprofile = $conn->query($profile);

if($resultprofile->num_rows > 0){

    while ($rows = $resultprofile->fetch_assoc()) {
        $firstname = $name;
        $lastname = $rows["lastname"];
        $gender =$rows["gender"];
        $passno = $rows["passno"];
        $dob=$rows["dob"];
        $Nationality= $rows["nationality"];
        $title =$rows["title"];
        $cellpo = $rows["Cellpo"];
        $institution= $rows["inistitution"];
        $email=$rows["email"];


    }



}

$course1 = "select * from course1 where email='$email'";
$resultc1=$conn->query($course1);

if($resultc1->num_rows > 0){

    while ($rows = $resultc1->fetch_assoc()) {
        $course1title=$rows["title"];


    }



}






$course2 ="select * from course1 where email='$email'";
$resultc2=$conn->query($course2);

if($resultc2->num_rows > 0){

    while ($rows = $resultc2->fetch_assoc()) {
        $course2title=$rows["title"];


    }



}






    




?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body background="css/2.jpg">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-2 col-lg-2">

            <img src="index.jpg" width="150" height="150"  alt="image">

            

        </div>
        <div class="col-md-6 col-lg-8 third">

            <p>Name: <?php  echo $firstname.$lastname;?></p>
            <p>Gender: <?php  echo $gender;?></p>
            <p>Passport number: <?php  echo $passno;?></p>
            <p>Date of Birth: <?php  echo $dob;?></p>
            <p>Nationality: <?php  echo $Nationality;?></p>
            <p>Institution: <?php  echo $institution;?></p>
            <p>Title: <?php  echo $title;?></p>
            <p>Cell Phone: <?php  echo $cellpo;?></p>
            <p>Course title 1: <?php  echo $course1title;?> </p>
            <p>Course title 2: <?php  echo $course2title;?></p>

            <p><a href="index.pdf">CV</a></p>

    </div>
        <div class="col-md-4 col-lg-2">
            
            
            
        </div>
    </div>
</div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

<?php

session_start();

/*if(empty($_SESSION["username"])){

    header("Location: adefee.html");




}*/

?>