<?php
session_start();
require "Conn.php";
require "checkapplied.php";


$s=' <!doctype html>
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
          <div style="text-align: center;">
          <h3>NUAA SUMMER COURSE TEACHER&#39S FORM</h3>
          
          
        
          </div>
          <div class="first">
            <h4 style="text-align: center;">Teacher&#39s Information</h4>
    <form name="RegisterForSummer" method="POST" action="RegisterSummer.php" enctype="multipart/form-data"  onsubmit="return validateform()">
      
  <div class="form-group">
    <label for="exampleInputEmail1">first name</label>
    <input name="fname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last name</label>
    <input name="lname" type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name" required="">
  </div>
  <div class="form-group">
  <label  for="exampleInputPassword1">Gender</label>
  
  <div class="radio">
  
    <label class="radio-inline" for="exampleInputPassword1">Male
    <input name="Gender" type="radio" value="MALE" class="form-control" id="exampleInputPassword1" placeholder="Last Name" required=""></label>
    
    <label class="radio-inline" for="exampleInputPassword1">Female
    <input name="Gender" type="radio" value="FEMALE" class="form-control" id="exampleInputPassword1" placeholder="Last Name" required=""></label>
    
</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PassPort Number</label>
    <input name="passno" type="text" class="form-control" id="exampleInputPassword1" placeholder="PNO" required="">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Date Of Birth</label>
    <input name="dob" type="date" class="form-control" id="exampleInputPassword1" placeholder="DOB" required="">
  </div>


  
  <div class="form-group">
    <label for="exampleInputPassword1">Institution</label>
    <input name="inst" type="text" class="form-control" id="exampleInputPassword1" placeholder="Inst" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nationality</label>
    <input name="Nationality" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nationality" required="">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Cell Phone</label>
    <input name="cellpo" type="Phone" class="form-control" id="exampleInputPassword1" placeholder="+86" required="">
  </div>
<div class="form-group">
  <label  for="exampleInputPassword1">Preferred Time Slot</label>
  
  <div class="radio">
  
    <label class="radio-inline" for="exampleInputPassword1">JULY 14-15
    <input name="pts" type="radio" value="JULY 14-15" class="form-control" id="exampleInputPassword1"  required=""></label>
    
    <label class="radio-inline" for="exampleInputPassword1">AUGUST 1-2
    <input name="pts" type="radio" value="AUGUST 1-2" class="form-control" id="exampleInputPassword1" required=""></label>
    
</div>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Photo</label>
     <input name="image" type="file" class="form-control" id="exampleInputPassword1" placeholder="*.jpg" required="">
     <small>Photo type must be *.JPG</small>
  
  
</div>
<br>
<div style="text-align: center;">
            <h4>Course Information 1(Option 1)</h4>
            <p style="color: red">*Please Fill in detail Information</p>
            <p style="color: red">*use one paragraph per filed to describe the fields below</p>
          </div>
              <div class="form-group">
    <label for="exampleInputPassword1">Course Title</label>
    <input name="coursetit1" type="text" class="form-control" id="exampleInputPassword1" placeholder="Course title" required="">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Course Aims</label>
    <textarea class="form-control" rows="5" name="courseaims1" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Course Structure</label>
    <textarea class="form-control" rows="5" name="coursestru1" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prerequisite Courses</label>
    <textarea class="form-control" rows="5" name="Prerequisite1" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Text-Books</label>
    <textarea class="form-control" rows="5" name="Textbooks1" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">References</label>
    <textarea class="form-control" rows="5" name="References1" id=""></textarea>
  </div> 
            <br>
            <div style="text-align: center;">
            <h4>Course Information 2(Option 2)</h4>
            <p style="color: red">*Please Fill in detail Information</p>
          </div>
               <div class="form-group">
    <label for="exampleInputPassword1">Course Title</label>
    <input name="coursetit2" type="text" class="form-control" id="exampleInputPassword1" placeholder="Course title"required="">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Course Aims</label>
    <textarea class="form-control" rows="5" name="courseaims2" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Course Structure</label>
    <textarea class="form-control" rows="5" name="coursestru2" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prerequisite Courses</label>
    <textarea class="form-control" rows="5" name="Prerequisite2" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Text-Books</label>
    <textarea class="form-control" rows="5" name="Textbooks2" id=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">References</label>
    <textarea class="form-control" rows="5" name="References2" id=""></textarea>
  </div>


<br>
<h4 style="text-align: center;">CV</h4>
<p style="color: red">*CV type must be *.PDF</p>
<div class="form-group">
    <label for="exampleInputPassword1">CV</label>
     
     <input name="cv" type="file" class="form-control" id="exampleInputPassword1" placeholder="*.PDF" required="">
     
  </div>
  <br>
  <button type="Submit" class="btn btn-lg btn-primary" style="text-align: center;">send</button>
</form>

</div>
</div>
</div>
<div class="col-md-4 col-lg-2">



  </div>

</div>
</div>

<script>

function validateform(){
   

        var  cv = document.forms["RegisterForSummer"]["cv"].value;
        var image =document.forms["RegisterForSummer"]["image"].value;


        if (!image.match(/.(jpg)$/i)){
            alert("photo type must be jpg ");
            return false;
          }

        if (!cv.match(/.(pdf)$/i)){
              alert("cv type must be pdf ");
              return false;

            }
            return true;


  }





</script>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>';




/*function checkifapplied($email,$conn)
{
   $querys = "select * from appliers where email ='$email'  ";

   $results=$conn->query($querys);

   if( $results->num_rows>0){
      
            
            return false;

         }
         else{
           

          return true;

       }



   


}
*/

if(!empty($_SESSION["name"])){
$email = $_SESSION["name"];
if(!checkifapplied($email,$conn)){

   header("Location: SeeResult.php");


}
else{
  echo $s;



}
}
else{

  header("Location: login.html");
}



?>