<?php  
 require("config.php");
require("database.php");

    $queryId = "SELECT MAX(id) FROM Gyms";
    $res=$database->query($queryId);
    $row=$res->fetch_assoc();
    $id=$row['MAX(id)'];


 if(isset($_POST['uploadfilesub'])) {

  $filename = $_FILES['uploadfile']['name'];
  $filetmpname = $_FILES['uploadfile']['tmp_name'];
  $folder = 'images/Logos/';

  move_uploaded_file($filetmpname, $folder.$filename);

  $sql = "INSERT INTO `Logos`(`gymId`, `imgName`) VALUES ($id,'$filename')";
  $result=$database->query($sql);

  $filename = $_FILES['uploadImg1']['name'];
  $filetmpname = $_FILES['uploadImg1']['tmp_name'];
  $folder = 'images/';

  move_uploaded_file($filetmpname, $folder.$filename);

  $sql = "INSERT INTO `uploadedimage`(`imagename`, `gymId`) VALUES ('$filename',$id)";
  $result=$database->query($sql);
  header('Location: addGym4.html');
 }


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
  <script src="js/search.js"></script>
  <script src="js/autoComplete.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  
<style>

.imageUpload{
  width: 200px;
  height: 200px;
  text-align: center;
  background-image:url(images/plus.png);
}

</style>
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

    


  <section class="container-fluid padding">
  <form method="post" enctype="multipart/form-data">  
    <div id="addLogo" class="toRight">
       

        <label for="imageUpload" class="imageUpload" id="insertLogo">לחצו על מנת להעלות את לוגו המועדון</label>
        <input type="file" name="uploadfile" id="imageUpload" accept="image/*" style="display: none" onchange="preview_logo(event)">
        <p>שימו לב שעל הלוגו להיות במידות של 50X50 פיקסלים</p>

    </div>
  </section>
  <div class="clear"></div>
  <hr>
  <section class="container-fluid padding">
       
      <div id="addImage" class="toRight">
         
  
          <label for="imageUpload" class="imageUpload" id="insertImage"><span id=inputTitle>לחצו על מנת להוסיף תמונות של המועדון</span></label>
          <input type="file" name="uploadImg1" id="imageUpload" accept="image/*" style="display: none" onchange="preview_image(event)">
          
          
      </div>
      <div class="clear"></div>
      <div class="container-fluid padding">
   
      <input type="submit" name="uploadfilesub" value="הבא" class="btn btn-primary text-center sign_up toLeft"/>
      
</div>
      </form>
    </section>

  <div class="clear"></div>

  <script> 
  
  function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                
                var src = reader.result;
                var url = "url("+src+")";
                document.getElementById('insertImage').style.backgroundImage = url;
                document.getElementById("insertImage").style.backgroundSize = "200px 200px";
            }
            reader.readAsDataURL(event.target.files[0]);
        }
 

 function preview_logo(event) {
            var reader = new FileReader();
            reader.onload = function () {
                
                var src = reader.result;
                var url = "url("+src+")";
                document.getElementById('insertLogo').style.backgroundImage = url;
                document.getElementById("insertLogo").style.backgroundSize = "200px 200px";
            }
            reader.readAsDataURL(event.target.files[0]);
        }

  
 </script>  

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

  
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB82EdqJSv80J9--zaL2APp17ybPYlJGc4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>
  
  


</body>

</html>