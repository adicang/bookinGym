<?php
    require("config.php");
    require("database.php");
    
    
    
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

    $queryId = "SELECT MAX(id) FROM Gyms";
    $res=$database->query($queryId);
    $row=$res->fetch_assoc();
    $id=$row['MAX(id)'];

	

    if ($urlaray['Sunday'] && !$urlaray['fromSunday'] || $urlaray['Sunday'] && !$urlaray['toSunday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום ראשון');
    }
    else if($urlaray['Monday'] && !$urlaray['fromMonday'] || $urlaray['Monday'] && !$urlaray['toMonday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום שני');
    }
    else if($urlaray['Tuesday'] && !$urlaray['fromTuesday'] || $urlaray['Tuesday'] && !$urlaray['toTuesday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום שלישי');
    }
    else if($urlaray['Wednesday'] && !$urlaray['fromWednesday'] || $urlaray['Wednesday'] && !$urlaray['toWednesday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום רביעי');
    }
    else if($urlaray['Thursday'] && !$urlaray['fromThursdayy'] || $urlaray['Thursday'] && !$urlaray['toThursday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום חמישי');
    }
    else if($urlaray['Friday'] && !$urlaray['fromFriday'] || $urlaray['Friday'] && !$urlaray['toFriday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום שישי');
    }
    else if($urlaray['Saturday'] && !$urlaray['fromSaturday'] || $urlaray['Saturday'] && !$urlaray['toSaturday']){
        $post_data = array('code'=>0,'loginError'=>'*אנא הזן שעות עבור יום שבת');
    }
    else{
        $sql="INSERT INTO `DaysAndHours`(`gymId`, `Sunday`, `SundayFrom`, `SundayTo`, `Monday`, `MondayFrom`, `MondayTo`, `Tuesday`, `TuesdayFrom`, `TuesdayTo`, `Wednesday`, `WednesdayFrom`, `WednesdayTo`, `Thursday`, `ThursdayFrom`, `ThursdayTo`, `Friday`, `FridayFrom`, `FridayTo`, `Saturday`, `SaturdayFrom`, `SaturdayTo`) VALUES(".$id.",'".$urlaray['Sunday']."','".$urlaray['fromSunday']."','".$urlaray['toSunday']."','".$urlaray['Monday']."','".$urlaray['fromMonday']."','".$urlaray['toMonday']."','".$urlaray['Tuesday']."','".$urlaray['fromTuesday']."','".$urlaray['toTuesday']."','".$urlaray['Wednesday']."','".$urlaray['fromWednesday']."','".$urlaray['toWednesday']."','".$urlaray['Thursday']."','".$urlaray['fromThursday']."','".$urlaray['toThursday']."','".$urlaray['Friday']."','".$urlaray['fromFriday']."','".$urlaray['toFriday']."','".$urlaray['Saturday']."','".$urlaray['fromSaturday']."','".$urlaray['toSaturday']."')";

        $result=$database->query($sql);
        
        if (!$result){
            $error='Can not add days and hours.  Error is:'.$database->get_connection()->error;
            $post_data = array('code'=>0,'loginError'=>$error);}
        else{
            $post_data = array('code'=>1,'loginError'=>'');
        }
        
    }
	
	
    $info = json_encode($post_data);
    echo $info;


     ?>
