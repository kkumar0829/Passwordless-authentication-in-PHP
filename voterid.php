
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>otp verification</title>
</head>
<body>

<?php
$voteridr=$_GET["voterid"];
$_SESSION["abc"]=$voteridr;
echo $_SESSION["abc"];
echo 	"<h1>enter the otp sent to your mobile </h1>".$voteridr."........";

/*
	$username = "achintyac77@gmail.com";
	$hash = "106ff03abe260d72b5b483984f58cab6e434d1ca0c25934f17d7d0750b12d4d2";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	
*/


	$numbers = $voteridr; // A single number or a comma-seperated list of numbers

	$name="123467890ABCDEFGHIJKLMN";
	$splitsvilla=str_split($name);
	$randomarraykeys=array_rand($splitsvilla,6);
	$mytoken="";
	for($i=0;$i<6;$i++){
		$mytoken.="".$splitsvilla[$randomarraykeys[$i]];
	}
	
	echo "this is token i send just for testing purpose...".$mytoken."  .......";
	
	
/*	$message = "your otp for login is ".$mytoken;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";

	print($result);

	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";
*/





// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC124f8e2f4de929552b0a7106e7e2bf0e";
$token = "f249985a75728ebfbd26c5a4d75837e7";
$client = new Client($sid, $token);
$client->messages->create(
    $numbers,
    array(
        'from' => '+19724262268',
        'body' => "OTP FOR VOTING IS ".$mytoken
    )
);








			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname= "otpdata";
			// Create connection
			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
					}
			echo "Connected successfully"."<br>";
			echo $numbers;	
			$sql="INSERT into verifyotp (phoneno , otp) values ('$numbers','$mytoken');";
			if($conn->query($sql)===TRUE)
				echo "holalllll";
			else
				echo "jholaaaa";




?>

<form action ="verifyotp.php" method="post">
	otp::<input type="text" name="otp"><br>
	<input type="submit" value="Verify" >
</form>

</body>
</html>
