<?php


/**
* 
*/
class Person
{
	private $email  ;
    private $firstname;
    private $lastname;
    private $gender;
    private $passno;
    private $dob;
    private $nationality;
    private $inistitution;
    private $title;

    private $Cellpo;
    private $preferredtime;
	
	function __construct($email,$firstname,$lastname,$gender,$passno,
		$dob,$nationality,$inistitution,$title,$Cellpo,$preferredtime)
	{
		$this->$email=$email;
		$this->$firstname=$firstname;
		$this->$lastname=$lastname;
		$this->$gender=$gender;
		$this->$passno=$passno;
		$this->$dob=$dob;
		$this->$nationality=$nationality;
		$this->$inistitution=$inistitution;
		$this->$title=$title;
		$this->$Cellpo=$Cellpo;
		$this->preferredtime=$preferredtime;


	}


	 function writeintodb($conn){

		$query="insert into person
		 values('$this->$email','$this->$firstname','$this->$lastname','$this->$gender','$this->$passno',
		 '$this->$dob','$this->$nationality','$this->$inistitution','$this->$title','$this->$Cellpo',
		 '$this->preferredtime')";

		if($conn->query($query)){
			return true;

		}else{

		return false;
	}



	}
}



?>