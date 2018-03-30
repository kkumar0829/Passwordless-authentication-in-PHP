<?php
$nameErr="";
$ageErr="";
$phnoErr="";
$counter=0;
function validationfun(){
	$name = $_POST["name"];
	if (!preg_match("/^[a-zA-Z ]*$/",$name))
  		$GLOBALS['nameErr'] = "wrong name format";
  	else
  		$GLOBALS['counter']=$GLOBALS['counter']+1;
}

function validationage(){
	$age = $_POST["age"];
	if (!preg_match("/^[0-9]+$/",$age))
  		$GLOBALS['ageErr'] = "wrong age format ";
  	else
 		$GLOBALS['counter']=$GLOBALS['counter']+1;

}

function validationphno(){
	$phno = $_POST["phno"];
	if (!preg_match("/^[+0-9]+$/",$phno))
  		$GLOBALS['phnoErr'] = "wrong phno format";
  	else
  		$GLOBALS['counter']=$GLOBALS['counter']+1;
}


if($_SERVER["REQUEST_METHOD"]=="POST"){

	if(empty($_POST["name"]))
		$GLOBALS['nameErr'] = "Name Required";
	else
		validationfun();

	if(empty($_POST["age"]))
		$GLOBALS['ageErr'] = "Age Required";
	else
		validationage();

	if(empty($_POST["phno"]))
		$GLOBALS['phnoErr'] = "Phone Number Required ";
	else
		validationphno();
	if($GLOBALS['counter']==3){
				echo "starting to save to database";
				$na=$_POST["name"];
				$ag=$_POST["age"];
				$lo=$_POST["location"];
				$ph=$_POST["phno"];

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname= "otpdata";
			
				$conn = new mysqli($servername, $username, $password,$dbname);
				if ($conn->connect_error) 
    				die("Connection failed: " . $conn->connect_error);

    			$check_duplicate="select age from register_voter where phone =$ph";
    			$counting=$conn->query($check_duplicate)->fetch_assoc();
    			if(!is_null($counting)){    			
    				echo "already in db";
    				header("Location: ../Login_v1/index.html"); 
    				}
    			else{
    				$sql="insert into register_voter(name,age,location,phone) values ('$na','$ag','$lo','$ph')";
					if($conn->query($sql)==TRUE)
						echo "inserted your data into database";
					else
						echo "failed to inset data to database";	
    				}
			}	
	}
?>

<html>
<head>
	<title>
		Register@Election
	</title>
</head>
<body>
<style>
.error {color: #FF0000;}
</style>

	<form method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
	NAME::<input type="text" name="name" placeholder="name"><span class="error">* <?php echo $nameErr?></span><br>
	AGE::<input type="text" name="age">						<span class="error">* <?php echo $ageErr?></span><br>
	LOCATION::<input type="name" name="location"><br>
	Ph No::<input type="name" name="phno">					<span class="error">* <?php echo $phnoErr;?></span><br>
	<input type="Submit" value="Submit"><br>
</form>
</body>
</html>