<?php
session_start();
require './vendor1/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '2180070738736125',
  'app_secret' => 'ddf2b9adbec1fc7ca4b475cb334fa1d0',
  'default_graph_version' => 'v2.10',
]);
 
$helper = $fb->getRedirectLoginHelper();
$login_url=$helper->getLoginUrl("https://adica.mtacloud.co.il/signIn.php");

try{
	$accessToken=$helper->getAccessToken();

	if(isset($accessToken)){
		$_session['access_token']=(string)$accessToken;
		
		header("Location:signIn.php");
	}
} catch (Exeption $exc) {
	echo $exc->getTraceAsString();
}

if($_SESSION['access_token']){
	
	try{
		
			$fb->setDefaultAccessToken($_SESSION['access_token']);
			$res=$fb->get('/me?locale=en_US&fields=name,email');
			$user=$res->getGraphUser();
			 echo $user->getField('name');
	} catch (Exeption $exc) {
	echo $exc->getTraceAsString();
	}
}

?>