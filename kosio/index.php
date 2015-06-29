<?php
session_start();
 
if (isset($_POST['username'])) {
        
	include_once("dbConnect.php");
	
        $usname = strip_tags($_POST['username']);
	$paswd = strip_tags($_POST['password']);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	
	
	$sql = "SELECT id, username, password FROM kosio1 WHERE username = '$usname' AND activated = '1' LIMIT 1";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	
	
	if ($usname == $dbUsname && $paswd == $dbPassword) {
		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;
		header("Location: user.php");
	} 
	
}
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BEst NEws login</title>
<link rel="stylesheet" type="text/css" href="css/mystyles.css" media="screen" />


<style type="text/css">
body {
    background:  #ffffff url("images/green.jpg") no-repeat;
}

</style>


</head>
<body>
   <div id="home"><a href="#"><img src="images/tivenews.gif" alt="home"></a></div>  


<center>



<p style="font-size: 16px; font-weight: bold; color: #ffffff; text-shadow: 0px 1px 2px rgba(1,1,1,0.3);">Add to chrome <span class="e3o0356g51" id="e3o0356g51_6" style="height: 16px;">
			<a href="#" onclick="www.google.bg"><img src="images/button_google.png" style="margin: 3px 4px 0 0; width: 24px; height: 24px;"></a>
			<style="font-size: 16px; font-weight: bold; color: #ffffff; text-shadow: 0px 1px 2px rgba(1,1,1,0.3);">Add to facebook <span class="e3o0356g51" id="e3o0356g51_6" style="height: 16px;">
						 <a href="#" onclick="www.google.bg"><img src="images/facebook.jpg"  style="margin: 3px 4px 0 0; width: 24x; height: 24px;"></a>
</center>

			<center>
<td align="center" valign="middle" colspan="3" style="height: 120px;" class="notranslate">
                <div>
                    <p style="font-family: 'Arvo', 'Corbel', 'Calibri', 'Lucida Sans', 'Helvetica Neue', 'Helvetica', 'Tahoma', 'Myriad', 'Verdana', sans-serif; font-size: 28px; color: #ffffff; text-shadow: 0px 1px 2px rgba(1,1,1,0.3); line-height: 28px;">Change the way you read the <span class="e3o0356g51" id="e3o0356g51_7" style="height: 28px;">news</span>.</p><br>
                    <p style="font-size: 16px; font-weight: bold; color: #ffffff; text-shadow: 0px 1px 2px rgba(1,1,1,0.3);">The <span class="e3o0356g51" id="e3o0356g51_6" style="height: 16px;">Best News</span> <span class="e3o0356g51" id="e3o0356g51_1" style="height: 16px;">Web</span> App. Your personal news stream. Free.</p>
                </div>
            </td>
</center>

<div id="wrapper">
<center>
<div class="container"> <!-- Unnecessary tag -->
    <div class="form">
        <div class="header">
            Member Login
        </div>
        <div class="body">
            <form id="form" action="index.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Username" name="username" required/><br>
                <input type="password" placeholder="Password"  name="password" required/><br>
                <input type="submit" value="Login Now" name="Submit"/><br>
				
				<br><p style="font-size: 16px; font-weight: bold; color: #ffffff; text-shadow: 0px 1px 2px rgba(1,1,1,0.3);">SIGN UP WITH <span class="e3o0356g51" id="e3o0356g51_6" style="height: 16px;"></br>
			<a href="#" onclick="www.google.bg"><img src="images/button_google.png" style="margin: 3px 4px 0 0; width: 24px; height: 24px;"></a>
			 <a href="#" onclick="www.google.bg"><img src="images/facebook.jpg"  style="margin: 3px 4px 0 0; width: 24x; height: 24px;"></a>
			 <a href="#" onclick="www.google.bg"><img src="images/t.png"  style="margin: 3px 4px 0 0; width: 24px; height: 24px;"></a>
			<a href="#" onclick="www.google.bg"><img src="images/link.png"  style="margin: 3px 4px 0 0; width: 24x; height: 24px;"></a>
			</form>
        </div>
    </div>
	<center>
<a href="register.php"><input type="Submit"  value="SING UP" name="Register" ></a>
</center>
</div>
</center>
</body>
</html>