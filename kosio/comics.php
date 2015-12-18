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
         
                 
        
              
            
         </li>
		

         <li><a href="about.php">About</a></li>
        <li><a href="mynews.php">My News</a></li>
		  <li><a href="user.php">All news</a></li>
		    <li><a href="#"><?php echo $result;?></a></li>
    </ul>               </div>


                     </div>
     </div>
 </div>
 <center>
  <h1>Add a news</h1>
    <li><a href="own.php">Create your own news</a></li>
 </center>
 </body>
 </html>
<?php
if(isset($_POST['submit'])){
$selected_val = "sport"; 
echo "You have selected :" .$selected_val; 
		$link1 = $_POST['link'];
		$link1 = mysql_real_escape_string($_POST['link']);

		$image =' ';
		$link = mysqli_connect("localhost", "root", "", "kosio");
		
		$topic=$selected_val;
		$input = @file_get_contents($link1) or die("Could not access file: $link1");
$html = file_get_contents($link1);
function curl_get_file_size( $url ) {
  // Assume failure.
  $result = -1;

  $curl = curl_init( $url );

  // Issue a HEAD request and follow any redirects.
  curl_setopt( $curl, CURLOPT_NOBODY, true );
  curl_setopt( $curl, CURLOPT_HEADER, true );
  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true ); 

  $data = curl_exec( $curl );
  curl_close( $curl );

  if( $data ) {
    $content_length = "unknown";
    $status = "unknown";

    if( preg_match( "/^HTTP\/1\.[01] (\d\d\d)/", $data, $matches ) ) {
      $status = (int)$matches[1];
    }

    if( preg_match( "/Content-Length: (\d+)/", $data, $matches ) ) {
      $content_length = (int)$matches[1];
    }

    // http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
    if( $status == 200 || ($status > 300 && $status <= 308) ) {
      $result = $content_length;
    }
  }
echo $result;
  return $result;
}
$dom = new DOMDocument();
@$dom->loadHTML($html);

// grab all the on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");

for ($i = 0; $i < $hrefs->length; $i++) {
       $href = $hrefs->item($i);
       $url = $href->getAttribute('href');
       echo $url.'<br />';
$file_size = curl_get_file_size($url);

}

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
}
?>
<html>

		<head>
			<title>BESTNEWS - Registration</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			
			
			
			<style type="text/css">
			
body {
    background:  #ffffff url("images/green.jpg") no-repeat;
}

</style>
		</head>
		
		<body>
		
		
		
	
		<div id="form">
			<form align = "center" action = "comics.php" method = "POST">
				<h2>select link of publication</h2>
				<input placeholder = "link" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "text" name = "link" required/><br>
				<h2>select type of the news</h2>
				<select name="topic" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;">
<option     value="business">business</option>
<option value="sport">sport</option>
<option value="culture">culture</option>
<option value="science">science</option>
<option value="lifestyle">lifestyle</option>
<option value="health">health</option>
<option value="travel">travel</option>
<option value="comics">comics</option>
<option value="education">education</option>
</select>

				<input class = "button" type = "submit" value = "ADD the news" name = "submit" />
			</form>	
		</div>
		</body>
</html>		
