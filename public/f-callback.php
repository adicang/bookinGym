
<?php
require_once('include/init.php');
require 'include/f-config.php';


try{
	$accessToken=$helper->getAccessToken();
}
catch(\Facebook\Exceptions\FacebookResponseException $e){
	echo "Response Exeption: " . $e->getMessage();
	exit();
}catch(\Facebook\Exceptions\FacebookSDKException $e){
	echo "SDK Exeption: " . $e->getMessage();
	exit();
}
	
	
	if(!$accessToken){
		
		header("Location:signIn.php");
		exit();
	}
	
$oAuth2Client=$fb->getOAuth2Client();
if(!$accessToken->isLongLived())
	$accessToken= $oAuth2Client->getLongLivedAccessToken($accessToken);

$response=$fb->get("/me?fields=id,first_name,last_name,email",$accessToken);
$userData=$response->getGraphNode()->asArray();
$id=$userData['id'];
$first_name= $userData['first_name'];
$last_name= $userData['last_name'];
$full_name = $first_name . ' ' . $last_name;
$email=$userData['email'];

$sql="Select * from users where password='".md5($id)."'";
$result=$database->query($sql);
if ($result->num_rows > 0){
	$currUser=new User();
	$currUser=$currUser->find_user_by_id($full_name);
	$session->login($currUser);
}
else{
	$sql="INSERT INTO `users`(`userType`, `FullName`, `username`, `email`, `isApproved`, `password`) VALUES ('traineeUser','".$full_name."','".$full_name."','".$email."',1,'".md5($id)."')";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
        
if($error){
echo $error;
}	
$currUser=new User();
$currUser=$currUser->find_user_by_id($full_name);
$session->login($currUser);
}


header("Location:index.php");
exit();

?>


