<?php
    require("init.php");
    
    
    
    
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

    if($urlaray['adminUser']==1){
        $userType='adminUser';
    }
    else if($urlaray['traineeUser']==1){
        $userType='traineeUser';
    }
    $fullName=$urlaray['fullname'];
    $username=$urlaray['username'];
    $email=$urlaray['email'];
    $password=md5($urlaray['password']);
    if($urlaray['male']==1){
        $gender='male';
    }
    else if($urlaray['female']==1){
        $gender='female';
    }
    $address=$urlaray['address'];
    $yearOfBirth=$urlaray['yearOfBirth'];

    //check if username exists
    $sql="SELECT * FROM `users` where username='".$username."'";
    $result=$database->query($sql);
    if ($result->num_rows > 0){
        $post_data = array('code'=>0,'regError'=>'שם משתמש לא פנוי');
    }
    else{
        $error=user::add_user($userType,$fullName,$username,$email,$password,$gender,$address,$yearOfBirth);
        if ($error){
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
            $post_data = array('code'=>0,'regError'=>$error);
        }
        else{
            $post_data = array('code'=>1,'regError'=>'');
        }
    }  
   
	
    $info = json_encode($post_data);
    echo $info;


     ?>
