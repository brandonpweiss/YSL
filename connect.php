<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@thexfr.org";
    $email_subject = "XFR Contact";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['businessname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name']; // required
    $businessname = $_POST['businessname']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$businessname)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Business Name: ".clean_string($businessname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "phone: ".clean_string($phone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THANKS FOR YOUR INTEREST IN THE TRANSFER STATION</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
	<script src="jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="An innovative resource center for artists and entrepreneurs, and a unique venue for the community they inspire. Located on Main Street in Manayunk, The Transfer Station offers tailored-made spaces and customized support services for bringing ideas to life."/>
	<style type="text/css">
	body{
		background: #ededed;
	}
	</style>
</head>
<body  data-spy="scroll" data-target="nav">
	<header>
		<div class="content">
		<img src="img/logo.png" id="xfr" alt="XFR">
		<article id="tagline">
			<div id="innovative">THANK YOU FOR YOUR INTEREST!</div>
		</article>
		<div id="inputs">
			Now, let your friends know!<br>
		<a href="https://www.facebook.com/sharer/sharer.php?u=http://www.thexfr.org" target="_blank"><img src="images/facebook.jpg" alt="FACEBOOK"></a><a href="http://clicktotweet.com/HCrck"> &nbsp;<img src="images/twitter.jpg" alt="Tweet"></a>
		</div><br><br>
		<a href="index.php">CLICK HERE TO RETURN TO THEXFR.ORG ></a>
		</div>
	</header>	
</body>
</html>
 
<?php
}
?>