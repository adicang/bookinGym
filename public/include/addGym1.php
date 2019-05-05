<?php
    require("init.php");
    
    
    

    
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

	
	

    if (!$urlaray['name']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שם מועדון');
    }
    else if(!$urlaray['email']) {
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן כתובת אימייל');
    }
    else if(!filter_var($urlaray['email'], FILTER_VALIDATE_EMAIL)) {
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן כתובת אימייל תקינה');
    }
    else if(!$urlaray['phone']) {
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן מספר טלפון');
    }
	else if(strlen($urlaray['phone'])!=9 && strlen($urlaray['phone']) !=10){ 
		 $post_data = array('code'=>0,'loginError'=>'*אנא הזן מספר טלפון תקין');
    }
    else if(!ctype_digit($urlaray['phone'])){ 
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן מספר טלפון תקין');
   }
    else if(!$urlaray['description']) {
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן תיאור');
    }
    else if(!$urlaray['address']) {
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן כתובת');
    }
    else if(!$urlaray['type']) {
        $post_data = array('code'=>0,'loginError'=>'*אנא בחר סוג מועדון');
    }
    else{
        $userId=$session->get_user_id();
        $sql="insert into `Gyms`(`name`,`email`,`phone`,`description`,`address`,`type`,`lat`,`lng`,`website`,`Manager_id`) values('".$urlaray['name']."','".$urlaray['email']."','".$urlaray['phone']."','".$urlaray['description']."','".$urlaray['address']."','".$urlaray['type']."',".$urlaray['lat'].",".$urlaray['lng'].",'".$urlaray['website']."',".$userId.")";
        $result=$database->query($sql);
        
        if (!$result){
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
        $post_data = array('code'=>0,'loginError'=>$error);}
        else{
            $post_data = array('code'=>1,'loginError'=>'');
        }
        
    }
	

		
    $info = json_encode($post_data);
    echo $info;


   
  ?>
