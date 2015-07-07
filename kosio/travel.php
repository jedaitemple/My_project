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
         
                 
                     <ul>
                         <li><a href="#">Front Page</a></li>
                         <li><a href="#">Blog Blocks</a></li>
                         <li><a href="#">Pinboard</a></li>
                         <li><a href="#">Press Reliese</a></li>
                     </ul>
              
            
         </li>
		

         <li><a href="#">About</a></li>
        <li><a href="mynews.php">My news</a></li>
		    <li><a href="#"><?php echo $result;?></a></li>
			<li><a href="index.php">Logout</a></li>
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
  
  <p style="font-family: 'Arvo', 'Corbel', 'Calibri', 'Lucida Sans', 'Helvetica Neue', 'Helvetica', 'Tahoma', 'Myriad', 'Verdana', sans-serif; font-size: 28px; color: #ffffff; text-shadow: 0px 1px 2px rgba(1,1,1,0.3); line-height: 28px;">Travel <span class="e3o0356g51" id="e3o0356g51_7" style="height: 28px;">news</span></p><br>
  
  <div class="container">
        <div class="row">
            <div class="twelve columns" id="imenu">
            <div id="nav" class="nine columns">
                           
     <ul id="nav_menu">
       	<li><a href='addnews.php'>Add new News</a></li>

   <li><a href='user.php'>All news</a></li>
   <li class='#'><a href='business.php'>Business and finace</a>
      <li class='sport.php'><a href='sport.php'>Sports</a>
   <li><a href='culture.php'>Culture and entertainment</a></li>
   <li><a href='science.php'>Science and Technology</a></li>
     <li><a href='travel.php'> Travel</a></li>
	   <li><a href='health.php'>Health</a></li>
		  <li><a href='lifestyle.php'>Lifestyle and fashion</a></li>
		 <li><a href='#'>Environment</a></li>
		  <li><a href='#'>Satire</a></li>
		  <li><a href='comics.php'>Comics</a></li>
  
 </center>
 
</div>

 </body>



 
</html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
$sql = "SELECT number,link,username,topic,links,image,date FROM links ORDER by number DESC";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$i=$uid;
	while($i>=0){
	$sql = "SELECT number,link,username,topic,links,image,date FROM links WHERE number='$i'";
	$i--;
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dblink = $row[1];
	$dbusername = $row[2];
	$dbtopic = $row[3];
	$dblinks = $row[4];
	$dbimage = $row[5];
	$dbdate = $row[6];
	$n=$uid;
	if($dbtopic=='travel'){
$form = <<<EOT
	<html>
		<head>


	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
	

		<script src="//api.linkedin.com/v1/people/~/shares?format=json" type="text/javascript"></script>
</head>
		<body>

<div class="press">
<div id="titlebar-5064-3" class="titlebar"> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#share_button').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: '.',
link: '$dblinks',
picture: '$dbimage',
caption: 'Great job'
});
});
});
</script>
 <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '721882704604585',
      xfbml      : true,
      version    : 'v2.3'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
		<script type="text/javascript">
FB.init({appId: "721882704604585", status: true, cookie: true});
  function share_me() {
    FB.ui({
      method: 'feed',
      app_id: '721882704604585',
      link: '$dblinks',
      picture: '$dbimage',
     
    },
    function(response){
      if(response && response.post_id) {
        self.location.href = 'http://localhost/My_project/kosio/user.php'
      }
      else {
        self.location.href = 'http://localhost/My_project/kosio/user.php'
      }
    });
  }
</script>
			<a href="#" onclick="share_me()"><img id = "share_button" src = "images/facebook.jpg" style="margin: 3px 4px 0 0; width: 24px; height: 24px;"></a>
		 <a href="https://plus.google.com/share?url={'$dblinks'}" style="margin: 3px 4px 0 0; width: 24px; height: 24px;"	onclick="javascript:window.open(this.href,
  '$dblink', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
  src="images/button_google.png" alt="Share on Google+"/></a>
			 
			<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?url=$dblinks"
  data-counturl="https://dev.twitter.com/web/tweet-button">
Tweet</a>
			<a id="share_linkedin" tabindex="-1" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=$dblinks" target="_blank"><i class="fa fa-linkedin-square fa-lg"></i> LinkedIn</a>

<img class="scaledImageFitWidth img" src='$dbimage' alt="" width="170" height="76">
 <i id="activityimg-5064-3" class="fa fa-globe icon activityimg" data-original-title="" title=""></i></a></div>
 <a id="itemlink-5064-3" class="itemlink" href="$dblinks" target="_blank" hasmore="0" feedurl="http://espn.go.com" feedid="103683" aid="236281278" cleanhref="http://espn.go.com/nfl/story/_/id/13187628/duke-ihenacho-washington-redskins-rants-inequity-nba-nfl-deals" cleanuri="13187628">
 <span><div class="headlinewrapper"><p id="headline-5064-3" class="headline">$dblink</p></div><p id="date-5064-3" class="date">$dbdate</p><div class="textwrapper">
 <p id="text-5064-3" class="text"></p></div></span></a></div></div>
 </body>
 </html>
EOT;
	echo $form;
	}
	}
	
?>