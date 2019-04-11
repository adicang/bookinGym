<?php  
 require("include/init.php");


    $queryId = "SELECT MAX(id) FROM Gyms";
    $res=$database->query($queryId);
    $row=$res->fetch_assoc();
    $id=$row['MAX(id)'];


    
 ?>

<!doctype html>
<html lang="heb" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/13546.jpg" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="js/autoComplete.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  

  <title>bookinGym</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand" href="index.html">
        <img src="images/13546.jpg" alt=""> bookinGym
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">דף הבית</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addGym1.html">הוסף מועדון</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="searchGym.html">חפש מועדון</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">העברת מנוי/כרטיסייה</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="contact.php">צור קשר</a>
          </li>

          <li>
            <a class="nav-link" style="color: #00aced;"><i class="fa fa-user-circle logged_in"
                aria-hidden="true"></i>כניסת משתמשים </a>
          </li>
          <li>
            <a class="nav-link " href="Includes/log_out.php"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> |
              התנתק</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section class="container-fluid padding">
      <div class="panel panel-primary toRight col-6" >
        <div class="panel-heading">
          <h3 class="panel-title text-right toRight">הוספת תמונות</h3>
        </div>
      </div>
    </section>

    <div class="clear"></div>

    


  <form method="post" enctype="multipart/form-data">  
  <section class="container-fluid padding">
    <div id="addLogo" class="toRight">
       
        <label for="logoUpload" class="imageUpload" id="insertLogo">לחצו על מנת להעלות את לוגו המועדון</label>
        <input type="file" name="file_array[]" id="logoUpload" accept="image/*" style="display: none" onchange="preview_logo(event)">
        <p>שימו לב שעל הלוגו להיות במידות של 50X50 פיקסלים</p>

    </div>
  </section>
  <div class="clear"></div>
  <hr>
  <section class="container-fluid padding">
       
      <div id="addImage1" class="toRight">
         
  
          <label for="imageUpload1" class="imageUpload" id="insertImage1"><span id="inputTitle1">לחצו על מנת להוסיף תמונות של המועדון </span> </label>
          <input type="file" name="file_array[]" id="imageUpload1" accept="image/*" style="display: none" onchange="uploadedImage(event,'insertImage1','2','inputTitle1')">
          
          
      </div>
      <div id="addImage2" class="toRight hide">
         
  
          <label for="imageUpload2" class="imageUpload" id="insertImage2"><span id="inputTitle2">לחצו על מנת להוסיף תמונות של המועדון </span> </label>
          <input type="file" name="file_array[]" id="imageUpload2" accept="image/*" style="display: none" onchange="uploadedImage(event,'insertImage2','3','inputTitle2')">
          
          
      </div>
      <div id="addImage3" class="toRight hide">
         
  
          <label for="imageUpload3" class="imageUpload" id="insertImage3"><span id="inputTitle3">לחצו על מנת להוסיף תמונות של המועדון </span> </label>
          <input type="file" name="file_array[]" id="imageUpload3" accept="image/*" style="display: none" onchange="uploadedImage(event,'insertImage3','4','inputTitle3')">
          
          
      </div>
      <div id="addImage4" class="toRight hide">
         
  
          <label for="imageUpload4" class="imageUpload" id="insertImage4"><span id="inputTitle4">לחצו על מנת להוסיף תמונות של המועדון </span> </label>
          <input type="file" name="file_array[]" id="imageUpload4" accept="image/*" style="display: none" onchange="uploadedImage(event,'insertImage4','5','inputTitle4')">
          
          
      </div>
      <div id="addImage5" class="toRight hide">
         
  
          <label for="imageUpload5" class="imageUpload" id="insertImage5"><span id="inputTitle5">לחצו על מנת להוסיף תמונות של המועדון </span> </label>
          <input type="file" name="file_array[]" id="imageUpload5" accept="image/*" style="display: none" onchange="uploadedImage(event,'insertImage5','6','inputTitle5')">
          
          
      </div>
      <div class="clear"></div>
      <div class="container-fluid padding">
   <?php
      if(isset($_POST['uploadfilesub'])) {

        if(!isset($_FILES['file_array'])){
          echo 'אנא העלה תמונות<br>';
        }
        else{
          $name_array = $_FILES['file_array']['name'];
          $tmp_name_array = $_FILES['file_array']['tmp_name'];
          $type_array = $_FILES['file_array']['type'];
          $size_array = $_FILES['file_array']['size'];
          $error_array = $_FILES['file_array']['error'];
          for($i = 0; $i < count($tmp_name_array); $i++){
              if(move_uploaded_file($tmp_name_array[$i], "images/GymImg/".$name_array[$i])){
                  if($i==0){
                    $sql = "INSERT INTO `Logos`(`gymId`, `imgName`) VALUES ($id,'$name_array[$i]')";
                    $result=$database->query($sql);
                  }
                  else{
                    $sql = "INSERT INTO `uploadedimage`(`imagename`, `gymId`) VALUES ('".$name_array[$i]."',".$id.")";
                    $result=$database->query($sql);
                  }
                  echo $name_array[$i]." upload is complete<br>";
              } else {
                  echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
              }
          }
        
          header('Location: addGym4.html');
        }
          
        }
   ?>
      <input type="submit" name="uploadfilesub" value="הבא" class="btn btn-primary text-center sign_up toLeft"/>
      
</div>
    </section>
      </form>

  <div class="clear"></div>


 

  <hr>
  <section class="container-fluid padding">
    <div class="row text-center padding">
      <div class="col-12">
        <h2>רשתות חברתיות</h2>
      </div>
      <div class="col-12 social padding">
        <a href="#" title="לא מומש"><i class="fab fa-facebook"></i></a>
        <a href="#" title="לא מומש"><i class="fab fa-twitter"></i></a>
        <a href="#" title="לא מומש"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" title="לא מומש"><i class="fab fa-instagram"></i></a>
        <a href="#" title="לא מומש"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </section>
  </main>
  <footer>
    <div class="container-fluid padding">
      <div class="row text-center">
        <div class="col-md-6">
          <hr class="light">
          <h4>פרטי התקשרות</h4>
          <hr class="light">
          <p>555-555-5555</p>
          <p>bookingym@gmail.com</p>
          <p>רחוב לאן 6, רמת גן</p>
          <p>5874298, ישראל</p>
        </div>
        <div class="col-md-6">
          <hr class="light">
          <h5>שעות פעילות</h5>
          <hr class="light">
          <p>ראשון - חמישי: 09:00 - 18:00</p>
          <p>שישי : 08:00-13:00</p>
          <p>שבת - סגור</p>
        </div>
        <div class="col-12">
          <hr class="light-100" />
          <h6> Sapir Levi, Elinor Perel, Adi Cang&copy;</h6>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/animations.js"></script>
  <script src='js/autoComplete.js'></script>

  
 <script src="js/addGym1.js"></script>
  
  


</body>

</html>