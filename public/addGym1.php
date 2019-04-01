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
      <a class="navbar-brand" href="index.html">
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
            <a class="nav-link" href="searchGym.html">חפש מועדון</a>
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
                  <a class="nav-link " href="reg.html"><i class="fa fa-user-plus fa-w-20" aria-hidden="true"></i> |
                    הירשם</a>
                </li>';
            }
          ?>
          
        </ul>
      </div>
    </nav>
  </header>

  <section class="container-fluid padding">
    <div class="toRight">
	
      <div class="panel panel-primary toRight col-6" style="margin-right:150px;">
        <div class="panel-heading">
          <h3 class="panel-title text-right toRight">פרטים כלליים</h3>
        </div>
        <div class="panel-body">
          <form>
            
              <div class="form-group col-12 text-right toRight">
                <label for="name">שם המועדון* </label>
                <input type="text" class="form-control input-sm textAlignRight" id="name" name="name"
                  placeholder="הכנס את שם המועדון">
              </div>
              <div class="form-group col-12 text-right toRight">
                <label for="email">אימייל*</label>
                <input type="text" class="form-control input-sm textAlignRight" id="email" name="email"
                  placeholder="הכנס אימייל ליצירת קשר">
              </div>

              <div class="form-group col-12 text-right toRight">
                <label for="phone">מספר טלפון*</label>
                <input type="text" class="form-control input-sm textAlignRight" id="phone" name="phone"
                  placeholder="הכנס מספר טלפון ליצירת קשר">
              </div>

              <div class="form-group col-12 text-right toRight">
                <label for="description">תיאור*</label>
                <textarea rows="4" class="form-control input-sm textAlignRight" id="description" name="description"
                  placeholder="כתוב תיאור קצר של מועדון הכושר"></textarea>
              </div>

              <div class="form-group col-12 text-right toRight">
                <label for="address">כתובת*</label>
                <input class="form-control input-sm textAlignRight" id="autocomplete"
                  placeholder="הכנס את כתובת המועדון" onFocus="geolocate()" type="text" />

              </div>
              <div class="form-group col-12 text-right toRight">
                  <label for="description">אתר המועדון</label>
                  <input type="url"  class="form-control input-sm textAlignRight" id="website" name="website"
                    placeholder="הזן את כתובת האינטרנט של המועדון"></textarea>
                </div>
              <div class="form-group col-12 text-right toRight">
                <label for="address">סוג המועדון*</label>
                <p>
                <label class="radio-inline"><input type="radio" name="type" id="gym" value="gym">מכון כושר</label>
                <label class="radio-inline"><input type="radio" name="type" id="studio" value="studio">סטודיו</label>
                <label class="radio-inline"><input type="radio" name="type" id="pool" value="pool">בריכה</label>
              </p>
              </div>
            </form>
            </div> 
		 
      </div>
  </section>
  <section class="container-fluid padding">
      <button onclick="addFirstDetails()" class="btn btn-primary text-center sign_up toLeft" value="הבא">הבא</button>
      <p id="loginError"></p>
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
  <script src='js/addGym1.js'></script>


  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB82EdqJSv80J9--zaL2APp17ybPYlJGc4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>




</body>

</html>