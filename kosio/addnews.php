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
         
                 
                     <ul>
                         <li><a href="#">Front Page</a></li>
                         <li><a href="#">Blog Blocks</a></li>
                         <li><a href="#">Pinboard</a></li>
                         <li><a href="#">Press Reliese</a></li>
                     </ul>
              
            
         </li>
		

         <li><a href="#">About</a></li>
        <li><a href="mynews.php">Show History</a></li>
		  <li><a href="user.php">All news</a></li>
		    <li><a href="#"><?php echo $result;?></a></li>
    </ul>               </div>


                     </div>
     </div>
 </div>
 <center>
  <h1>Add a news</h1>
 </center>
 </body>
 </html>
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['topic']; 
echo "You have selected :" .$selected_val; 
		$link1 = $_POST['link'];
		$link1 = mysql_real_escape_string($_POST['link']);
	
		$image =' ';
		$link = mysqli_connect("localhost", "root", "", "kosio");
		
		$topic=$selected_val;
		
		
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




			$dblink=$link1;
			 $ch = curl_init($dblink);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36');
    $res = curl_exec($ch);
    if ($res === false) {
        die('error: ' . curl_error($ch));
    }
    curl_close($ch);


/*** discard white space ***/


    $d = new DOMDocument();
    @$d->loadHTML($res);
	 $d->preserveWhiteSpace = false;
$images = $d->getElementsByTagName('img');



    $output = array(
      '',
    );
	 $output1 = array(
      '',
    );
    $x = new DOMXPath($d);
    $title = $x->query("//title");
	$flag=0;
    if ($title->length > 0) {
        $output['title'] = $title->item(0)->textContent;
    }
	
	$str = implode(',', $output);
	require_once('additions/simple_html_dom.php');
	require_once('additions/url_to_absolute.php'); // get image absolute url.
// options
$biggestImage = 'path to "no image found" image'; // Is returned when no images are found.
// process
$maxSize = -1;
$visited = array();
$url=$link1;
$html = file_get_html($url);
// loop images
foreach($html->find('img') as $element) {
    $src = $element->src;
    if($src=='')continue;// it happens on your test url
    $imageurl = url_to_absolute($url, $src);//get image absolute url
    // ignore already seen images, add new images
    if(in_array($imageurl, $visited))continue;
    $visited[]=$imageurl;
    // get image
    $image=@getimagesize($imageurl);// get the rest images width and height
    if (($image[0] * $image[1]) > $maxSize) {   
        $maxSize = $image[0] * $image[1];  //compare sizes
        $biggest_img = $imageurl;
    }
}
$image=$biggest_img; //return the biggest found image

	

// process

$tz = 'Europe/Sofia';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); 
$dt->setTimestamp($timestamp); 
$date=$dt->format('d.m.Y, H:i:s');
	$sql = "INSERT INTO links (number, link, username,topic,links,image,date) VALUES (0, '$str', '$usname','$topic','$link1','$image','$date')";
	print_r($output);
	
	
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
	
	}else{
	
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
		
		
		
	
		<div id="form">
			<form align = "center" action = "addnews.php" method = "POST">
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

</select>
			
				<input class = "button" type = "submit" value = "ADD the news" name = "submit" />
			</form>	
		</div>
		</body>
</html>		
		
	
EOT;
echo $form;	

}
?>