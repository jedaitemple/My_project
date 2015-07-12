<?php
include_once("dbConnect.php");
function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
         if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }    
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}
	
if(isset($_POST['submit'])){
		
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		
		if($pass1 == $pass2){
			//all good 
			$email = mysql_real_escape_string($_POST['email']);
			$username = mysql_real_escape_string($_POST['username']);
			$pass1 = mysql_real_escape_string($pass1);
			$pass2 = mysql_real_escape_string($pass2);
		$link = mysqli_connect("localhost", "root", "", "kosio");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (check_email_address($email)) {
    echo $email . ' is a valid email address.';
} else {
    echo $email . ' is not a valid email address.';
}



$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 

 
------------------------
Username: '.$username.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
kosio123'.$email.'
 
'; // Our message above including the link
                     
$headers = 'From:Bestnews.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email


			
			$sql = "INSERT INTO kosio1 (id, username, password, email,activated) VALUES (0, '$username', '$pass1', '$email','1')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

			
		}else{
			echo "Sorry, your passwords do not match.<br>";
			exit();
		}
		
		header('Location:index.php');
		
} else {
	
$form = <<<EOT
<html>
		<head>
			<title>BESTNEWS - Registration</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<link rel="stylesheet" type="text/css" href="css/mystyles.css" media="screen" />
			
			
			<style type="text/css">
			
body {
    background:  #ffffff url("images/green.jpg") no-repeat;
}

</style>
		</head>
		
		<body>
		   <div id="home"><a href="#"><img src="images/tivenews.gif" alt="home"></a></div>  
		
		
		
	
		<div id="form">
			<form align = "center" action = "register.php" method = "POST">
				<input placeholder = "Username" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "text" name = "username" required/><br>
				<input type = "text" style = "border: 1px solid black;width:154px;height:40px;margin-right:5px;" placeholder = "Email" name = "email" required/>
				<input placeholder = "Password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "password" name = "pass1" required/><br>
				<input placeholder = "Confirm Password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "password" name = "pass2" required/><br><br>
				<input class = "button" type = "submit" value = "Register" name = "submit" />
			</form>	
		</div>
		<form action = "index.php" align= "right" >
			<input class="button" style ="width:100px; font-size: 17px;;" type = "submit" name = "submit" value = "Login" />
		</form>
		</body>
</html>		
		
	
EOT;
echo $form;	
}
	
	
?>