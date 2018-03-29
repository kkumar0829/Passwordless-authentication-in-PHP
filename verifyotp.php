<?php
session_start();
?>

<?php
			
			$recieved_otp=$_POST["otp"];
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
			$sql="select  phoneno , otp from verifyotp where otp =\"$recieved_otp\"";
			$sql2="delete from verifyotp where otp =\"$recieved_otp\"";
			$result=$conn->query($sql);

			if($conn->query($sql)==TRUE)
				echo "holalllll";
			else
				echo "jholaaaa";


			echo "..............................."."<br>";
			echo "..............................."."<br>";
			echo "..............................."."<br>";

			while($row = $result->fetch_assoc()) {
				if($recieved_otp==$row["otp"]){
					echo "all the session variable i encounter during project "."<br>";
					print_r($_SESSION)."<br><br>";
						if($_SESSION["abc"]==$row["phoneno"])
							{
								echo "<b><br><h1>successfully otp matched wih phoneno";
								$conn->query($sql2);	
								header("Location: startbootstrap-coming-soon-gh-pages/index.html"); /* Redirect browser */
							}
						else
							echo "otp cannot be matched with phone no";
				}
				else
					echo "otp didnot matched";
    }




?>
