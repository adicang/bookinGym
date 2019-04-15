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
  <script src="js/search.js"></script>
  <script src="js/autoComplete.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
          <li class="nav-item active">
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

  <section class="container-fluid padding">
    <div class="form-group col-12 text-right toRight">
      <div id="locationField">
        <input class="autoCompleteSearchPage col-3" id="autocomplete"
          placeholder="הקלד את כתובת המגורים שלך" onFocus="geolocate()" type="text" />
        <button onclick="showDetails()" class="btn btn-primary text-center sign_up ">מצא לי מועדון כושר</button>
        
      </div>
    </div>
    <button type="submit" ></button>
  </section>



  <section class="container-fluid padding" style="width: 100%; height:750px;">
      <div class="col-sm-1 toRight">
 <form  >
    <div class="row text-right">
      <fieldset><strong>סוג מועדון: </strong><br>
        <input type="radio" id="gym" name="type" class="regular-checkbox" onclick="showDetails()"><label for="gym"> מכון כושר</label><br>
        <input type="radio" id="studio" name="type" class="regular-checkbox" onclick="showDetails()"><label for="studio">
          סטודיו</label><br>
        <input type="radio" id="pool" name="type" class="regular-checkbox" onclick="showDetails()"><label for="pool"> בריכה</label><br>
      </fieldset>
    </div>
    <div class="row  text-right">
      <fieldset><strong>חוגים: </strong><br>
        <input type="checkbox" id="TRX" name="TRX" class="regular-checkbox" onclick="showDetails()"><label for="TRX">TRX</label><br>
        <input type="checkbox" id="zumba" name="zumba" class="regular-checkbox" onclick="showDetails()"><label for="zumba">זומבה</label><br>
        <input type="checkbox" id="Pilatis_Machine" name="Pilatis_Machine" class="regular-checkbox" onclick="showDetails()"><label
          for="Pilatis_Machine">פילאטיס מכשירים</label><br>
        <input type="checkbox" id="Pilatis_mattress" name="Pilatis_mattress" class="regular-checkbox" onclick="showDetails()"><label
          for="Pilatis_mattress">פילאטיס מזרן</label><br>
        <input type="checkbox" id="Shaping" name="Shaping" class="regular-checkbox" onclick="showDetails()"><label for="Shaping">עיצוב
          וחיטוב</label><br>
        <input type="checkbox" id="HIIT" name="HIIT" class="regular-checkbox" onclick="showDetails()"><label for="HIIT">HIIT</label><br>
        <input type="checkbox" id="yoga" name="yoga" class="regular-checkbox" onclick="showDetails()"><label for="yoga">יוגה</label><br>
        <input type="checkbox" id="Spinning" name="Spinning" class="regular-checkbox" onclick="showDetails()"><label
          for="Spinning">ספינינג</label><br>
        <input type="checkbox" id="kikbox" name="kikbox" class="regular-checkbox" onclick="showDetails()"><label
          for="kikbox">קיק-בוקס</label><br>
      </fieldset>
    </div>
    <div class="row  text-right">
        <fieldset><strong>מתקנים: </strong><br>
          <input type="checkbox" id="swimmingPool" name="swimmingPool" class="regular-checkbox" onclick="showDetails()"><label for="swimmingPool">בריכה</label><br>
          <input type="checkbox" id="spa" name="spa" class="regular-checkbox" onclick="showDetails()"><label for="spa">ספא</label><br>
          <input type="checkbox" id="parking" name="parking" class="regular-checkbox" onclick="showDetails()"><label
            for="parking">חניה</label><br>
            <input type="checkbox" id="accessibility" name="accessibility" class="regular-checkbox" onclick="showDetails()"><label for="accessibility">נגישות</label><br>
        </fieldset>
      </div>
      <div class="row  text-right">
        <fieldset><strong>דירוג: </strong><br>
          <input type="checkbox" id="1star" name="1star" class="regular-checkbox" onclick="showDetails()"><label for="1star">מעל 1 כוכבים</label><br>
          <input type="checkbox" id="2star" name="2star" class="regular-checkbox" onclick="showDetails()"><label for="2star">מעל 2 כוכבים</label><br>
          <input type="checkbox" id="3star" name="3star" class="regular-checkbox" onclick="showDetails()"><label for="3star">מעל 3 כוכבים</label><br>
          <input type="checkbox" id="4star" name="4star" class="regular-checkbox" onclick="showDetails()"><label for="4star">מעל 4 כוכבים</label><br>
          <input type="checkbox" id="5star" name="5star" class="regular-checkbox" onclick="showDetails()"><label for="5star"> 5 כוכבים</label><br>
          </fieldset>
      </div>
  </form>
    </div>

  
    <div id="card" class="col-sm-5 toRight text-right"></div>
    <div class="col-sm-6 toRight" id="map"></div>
  

  </section>
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

  
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB82EdqJSv80J9--zaL2APp17ybPYlJGc4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>
  
  


</body>

</html>