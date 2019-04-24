<?php
  require("init.php");
  if($_FILES["file"]["name"] != ''){

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="../pdfFiles/";
    move_uploaded_file($file_loc,$folder.$file);



    
    $queryId = "SELECT MAX(id) FROM Gyms";
    $res=$database->query($queryId);
    $row=$res->fetch_assoc();
    $id=$row['MAX(id)'];
    $sql1="SELECT * FROM `pdfFiles` WHERE `gymId`=".$id."";
    $result1=$database->query($sql1);
    if ($result1->num_rows > 0){
        $sql = "UPDATE `pdfFiles` SET `pdfName`='".$file."' WHERE gymId=".$id."";
        $result=$database->query($sql);
    }
    else{
        $sql = "INSERT INTO `pdfFiles`(`pdfName`, `gymId`) VALUES ('".$file."',".$id.")";
        $result=$database->query($sql);
    }
  }
  

  
  
?>

