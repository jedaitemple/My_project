<?php
session_start();
include_once("dbConnect.php");
if (isset($_SESSION['id'])) {
	// Put stored session variables into local PHP variable
	$uid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$result = $usname;
} else {
	$result = "You are not logged in yet";
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $usname ;?> - Best news</title>
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/kosio.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/user.css" media="screen" />
<style type="text/css">
body {
   background:  #ffffff url("images/green.jpg") repeat-y;
}
</style>


</head>

<body>
<div class="container">
        <div class="row">
            <div class="twelve columns" id="imenu">
            <div id="nav" class="nine columns">
             <div id="home"><a href="#"><img src="images/tivenews.gif" alt="home"></a></div>                           
     <ul id="nav_menu">
        <li><a href="#">Refresh</a>
             
         </li>
         <li><a href="#">Sort By</a>
         
                 
               
              
            
         </li>
		

         <li><a href="about.php">About</a></li>
         <li><a href="mynews.php">My news</a></li>
		    <li><a href="myprofil.php"><?php echo $result;?></a></li>
			<li><a href="index.php">Logout</a></li>
    </ul>               </div>

	
                     </div>
     </div>
 </div>
  	<h1>Best News is the easiest way to create your news and to share them in social sites!</h1>
				<h2>Its nice!</h2>
			
				<h2>Just make a free account and join  us!</h2>
				<h2>In the future there will be an option to make an account from social sites<h2>

  
<h1>The Owner of this website is Konstantin Kostov</h1>
<h1>THe future of this website will be movies</h1>

 </body>


 
</html>