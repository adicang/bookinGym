<?php
	
  require_once('include/init.php');
  ?>
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>bookinGym</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand" href="index.php">
        <img src="images/13546.jpg" alt=""> bookinGym
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">דף הבית</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addGym1.php">הוסף מועדון</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="searchGym.php">חפש מועדון</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="transferDisplay.php">העברת מנוי/כרטיסייה</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="contact.php">צור קשר</a>
          </li>

         
          <?php

            if($session->get_signed_in()){
              echo '<li>
              <a class="nav-link" style="color: #00aced;" href="#">
                <i class="fa fa-user-circle logged_in" aria-hidden="true"></i> שלום '.$session->get_user_name().'</a>
            </li>';
              echo '<li>
                  <a class="nav-link " href="include/logout.php"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> |
                    התנתק</a>
                </li>';
            }
            else{
              echo '<li>
              <a class="nav-link" style="color: #00aced;" href="signIn.php">
                <i class="fa fa-user-circle logged_in" aria-hidden="true"></i>כניסת משתמשים</a>
            </li>';
              echo '<li>
                  <a class="nav-link " href="reg.php"><i class="fa fa-user-plus fa-w-20" aria-hidden="true"></i> |
                    הירשם</a>
                </li>';
            }
          ?>
          
        </ul>
      </div>
    </nav>
  </header>
  <main>
  <div class='regis'>
    <div class="landing-text regis-padding">
      <h1 class="home_h1" style="text-shadow: 1px 1px grey;">הצטרפו למשתמשי bookinGym</h1>    
     </div>
  </div>

  <section class="container-fluid padding" id="regForm">
    <div class="container" dir="rtl">
        <div class="row" style="margin-top: 4%;">
        <div class="col-md-4"></div>
        <div class="col-md-4 well text-center regForm">
          
                <div class="form-group">
                    <p><b>קוד אישור הרשמה נשלח למייל שהוזן</b></p>
                    <p>אנא הזינו את הקוד המצורף למייל על מנת להשלים את תהליך ההרשמה</p>
                    <label><input type="text" name="confirmationCode" required id="confirmationCode" placeholder="הזן קוד אישור"> </label>
                </div>
               
                <div class="form-group">
                    <p id="RegError"></p>
                </div>
                
                <button class="btn btn-primary text-center sign_up toLeft" value="הירשם" onclick="confirmUser()">המשך</button>
               
           
            <br>
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
          <p>ראשון - חמישי: 18:00 - 09:00</p>
          <p>שישי: 13:00 - 08:00</p>
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
  <script src='js/regis.js'></script>

  
  <script
    src="https://maps.googleapis.com/maps/api/js?key=,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>
  
  


</body>

</html>
