<?php
    require("init.php");
    
    
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

    $sql="DELETE FROM `subscriptionTransfer` WHERE `subTransferId`='".$urlaray['id']."'";
    $result=$database->query($sql);
    if (!$result){
        $post_data = array('code'=>0,'regError'=>'לא ניתן למחוק');
    }
    else{
            $post_data = array('code'=>1,'regError'=>'');
    }  
	
    $info = json_encode($post_data);
    echo $info;


     ?>
