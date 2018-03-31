<?php
session_start();
$_SESSION["fakeotp"]=9;
$repetErr="";
function validator(){
	$phno = $_POST["voterid"];
	if (!preg_match("/^[+0-9]+$/",$phno))
  		$GLOBALS['repetErr'] = "Invalid PhoneNo Format";
  	else
  		{
  			//checking that is it already registered ;
				$ph=$_POST["voterid"];
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
    				$_SESSION["abc"]=$_POST["voterid"];
					header("Location: ../voterid.php"); 
    				}
    			else{
    				echo "this Number is not registered please register";
					}	
	}
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

	if(empty($_POST["voterid"]))
		$GLOBALS['nameErr'] = "Enter phone number";
	else
		validator();
	}
				
?>



	<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				
					<span class="login100-form-title">
						Phone Number To Vote
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

						<form method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
							<input class="input100" type="text" name="voterid" placeholder="Enter Registered Mobile Number"><span><?php echo $repetErr; ?></span>
							<input class="login100-form-btn" type="submit" value="Login">
					</div>
					</form>

					
					<div class="text-center p-t-136">
						<a class="txt2" href="../Login_v13/index.php">
							Register In Voting List
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>