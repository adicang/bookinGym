<?php
    require("init.php");
  
    
    
    
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

    $queryId = "SELECT MAX(id) FROM Gyms";
    $res=$database->query($queryId);
    $row=$res->fetch_assoc();
    $id=$row['MAX(id)'];

	if(!$urlaray['businessNum']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את מספר העסק');
    }
    else if(!$urlaray['accountNum']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את מספר החשבון של העסק');
    }
    else if(!$urlaray['branchNum']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את מספר הסניף של העסק');
    }
    else if(!$urlaray['subscription'] && !$urlaray['card']){
        $post_data = array('code'=>0,'loginError'=>'*אנא בחר סוג מנוי');
    }
    else if($urlaray['subscription'] && !$urlaray['periodTimeSub']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את תקופת המנוי');
    }
    else if($urlaray['subscription'] && !$urlaray['periodTypeSub']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את תקופת המנוי');
    }
    else if($urlaray['subscription'] && !$urlaray['priceSub']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את מחיר המנוי');
    }
    else if($urlaray['card'] && !$urlaray['enterCount']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את מחיר הכרטיסייה');
    }
    else if($urlaray['card'] && !$urlaray['priceCard']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את מחיר הכרטיסייה');
    }
    else if($urlaray['card'] && !$urlaray['periodTimeCard']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את תקופת הכרטיסייה');
    }
    else if($urlaray['card'] && !$urlaray['periodTypeCard']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן את תקופת הכרטיסייה');
    }
    else{
        $sql="INSERT INTO `Gyms`(`account_num`,`businessNum`,`branchNum`) VALUES ('".$urlaray['accountNum']."','".$urlaray['businessNum']."','".$urlaray['branchNum']."') WHERE gymId = ".$id.")";
        $result=$database->query($sql);
        if (!$result){
            $error='Can not add business details.  Error is:'.$database->get_connection()->error;
            $post_data = array('code'=>0,'loginError'=>$error);}
        else{
            $post_data = array('code'=>1,'loginError'=>'');
        }
        if($urlaray['card']){
            $sql2 = "INSERT INTO `card`(`gymId`, `enterCount`, `price`, `periodTime`, `periodType`) VALUES (".$id.",".$urlaray['enterCount'].",".$urlaray['priceCard'].",".$urlaray['periodTimeCard'].",'".$urlaray['periodTypeCard']."')";
            $result2=$database->query($sql2);
            if (!$result2){
                $error='Can not add card details.  Error is:'.$database->get_connection()->error;
                $post_data = array('code'=>0,'loginError'=>$error);}
            else{
                $post_data = array('code'=>1,'loginError'=>'');
            }
        }
        if($urlaray['subscription']){
            $sql3 = "INSERT INTO `subscription`(`gymId`, `periodTime`, `periodType`, `price`) VALUES (".$id.",".$urlaray['periodTimeSub'].",'".$urlaray['periodTypeSub']."',".$urlaray['priceSub'].")";
            $result3=$database->query($sql3);
            if (!$result3){
                $error='Can not add subscription details.  Error is:'.$database->get_connection()->error;
                $post_data = array('code'=>0,'loginError'=>$error);}
            else{
                $post_data = array('code'=>1,'loginError'=>'');
            }
        }
        
    }
	
	
    $info = json_encode($post_data);
    echo $info;


?>