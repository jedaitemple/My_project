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
<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/user.css" media="screen" />
<style type="text/css">
body {
    background:  #ffffff url("images/green.jpg") no-repeat;
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
         
                 
                     <ul>
                         <li><a href="#">Front Page</a></li>
                         <li><a href="#">Blog Blocks</a></li>
                         <li><a href="#">Pinboard</a></li>
                         <li><a href="#">Press Reliese</a></li>
                     </ul>
              
            
         </li>
		

         <li><a href="#">About</a></li>
         <li><a href="#">Show History</a></li>
		    <li><a href="#"><?php echo $result;?></a></li>
    </ul>               </div>

		<div class="three columns">

 <form method="get" class="searchform">
     <div id="magnify"><img src="images/m.png" alt="magnify"></div>
     <div><input name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == 'Search') this.value = '';" type="text"></div>
     <div><input class="searchsubmit" value="" type="submit"></div>
 </form>          

 </div>
                     </div>
     </div>
 </div>
 <center>
  <h1>All News</h1>
 </center>
 
 <br><div id='cssmenu'></br>
<ul>



	<li><a href='addnews.php'>Add new News</a></li>

   <li><a href='user.php'>All news</a></li>
   <li class='#'><a href='business.php'>Business and finace</a>
      <li class='sport.php'><a href='#'>Sports</a>
   <li><a href='culture.php'>Culture and entertainment</a></li>
   <li><a href='science.php'>Science and Technology</a></li>
     <li><a href='travel.php'> Travel</a></li>
	   <li><a href='health.php'>Health</a></li>
		  <li><a href='lifestyle.php'>Lifestyle and fashion</a></li>
		 <li><a href='#'>Environment</a></li>
		  <li><a href='#'>Satire</a></li>
		  <li><a href='comics.php'>Comics</a></li>
		  
	   </ul>
	   </ul>
</div>

 </body>



 
</html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
$sql="SELECT COUNT(DISTINCT number) from  link";
	$query = mysqli_query($dbCon, $sql);
	$n=$sql;
	$i=0;
	while($i<=$n){
	$i++;
	$sql = "SELECT number,link,username,topic FROM link WHERE number='$i'";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dblink = $row[1];
	$dbusername = $row[2];
	$dbtopic = $row[3];
	$n=$uid;
	
   
	if($dbtopic=='culture'){
	
$form = <<<EOT
		<html>
		<body>
	<div id="content" name="content" tabindex="1" class="notranslate blur" style="right: 10px;"></br>
<li style="display: inline;" class="keynav withoutfocus">
<div class="press">
<div id="titlebar-5710-0" class="titlebar">
<img src="https://duh8wcwur1xop.cloudfront.net/images/favicon_overlay.png" alt="" align="absmiddle" id="favicon-5710-0" 
class="favicon" 
style="background-image: url(http://espn.go.com/favicon.ico);" data-url="http://espn.go.com/favicon.ico">
<div class="sourcewrapper">
<p id="source-5710-0" class="source" title="Copyright 2015 ESPN Inc.">ESPN.com - Tennis</p></div>
 <class="fa fa-globe icon activityimg" data-original-title=""
 title=""></i></a></div><a> 
 <span><div class="headlinewrapper"><p id="headline-5710-0"
 </div><p id="date-5710-0" 
 class="date">15 mins ago</p>
 </body>
 </html>
EOT;
	
	echo $form;
	print_r($dblink);
	}
	}
	
?>