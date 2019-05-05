<?php
    require("init.php");
    
    
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

    $queryId = "SELECT MAX(id) FROM Gyms";
    $res=$database->query($queryId);
    $row=$res->fetch_assoc();
    $id=$row['MAX(id)'];

    $counter=0;
    if($urlaray['zumba']==1) {
        $counter=$counter+1;
    }
    if($urlaray['HIIT']==1) {
        $counter=$counter+1;
    }
    if($urlaray['TRX']==1) {
        $counter=$counter+1;
    }
    if($urlaray['yoga']==1) {
        $counter=$counter+1;
    }
    if($urlaray['Pilatis_mattress']==1) {
        $counter=$counter+1;
    }
    if($urlaray['Pilatis_Machine']==1) {
        $counter=$counter+1;
    }
    if($urlaray['Spinning']==1) {
        $counter=$counter+1;
    }
    if($urlaray['kikbox']==1) {
        $counter=$counter+1;
    }
    if($urlaray['Shaping']==1) {
        $counter=$counter+1;
    }
    if($urlaray['spa']==1) {
        $counter=$counter+1;
    }
    if($urlaray['swimmingPool']==1) {
        $counter=$counter+1;
    }
    if($urlaray['parking']==1) {
        $counter=$counter+1;
    }
    if($urlaray['accessibility']==1) {
        $counter=$counter+1;
    }
    if($counter<2){
        $post_data = array('code'=>0,'loginError'=>'אנא בחר לפחות שני חוגים/מתקנים');
    }
    else{
        $sql1 = "INSERT INTO `Classes`(`gymId`, `zumba`, `HIIT`, `TRX`, `Yoga`, `Pilatis_mattress`, `Pilatis_Machine`, `Spinning`, `kikbox`, `Shaping`) VALUES (".$id.",'".$urlaray['zumba']."','".$urlaray['HIIT']."','".$urlaray['TRX']."','".$urlaray['yoga']."','".$urlaray['Pilatis_mattress']."','".$urlaray['Pilatis_Machine']."','".$urlaray['Spinning']."','".$urlaray['kikbox']."','".$urlaray['Shaping']."')";
        $result1=$database->query($sql1);
            
        if (!$result1){
            $error='Can not add classes.  Error is:'.$database->get_connection()->error;
            $post_data = array('code'=>0,'loginError'=>$error);}
        else{
            $post_data = array('code'=>1,'loginError'=>'');
        }  
        
        $sql2 = "INSERT INTO `Facilities`(`gymId`, `swimmingPool`, `spa`, `parking`, `accessibility`) VALUES (".$id.",'".$urlaray['swimmingPool']."','".$urlaray['spa']."','".$urlaray['parking']."','".$urlaray['accessibility']."')";
        $result2=$database->query($sql2);
            
        if (!$result2){
            $error='Can not add Facilities.  Error is:'.$database->get_connection()->error;
            $post_data = array('code'=>0,'loginError'=>$error);}
        else{
            $post_data = array('code'=>1,'loginError'=>'');
        }  
    }
	$info = json_encode($post_data);
    echo $info;
 ?>
