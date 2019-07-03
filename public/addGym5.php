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
          <li class="nav-item">
            <a class="nav-link" href="index.php">דף הבית</a>
          </li>
          <li class="nav-item active">
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
  <section class="container-fluid padding">
    <div class="panel panel-primary toRight col-6" >
      <div class="panel-heading">
        <h3 class="panel-title text-right toRight" style=" font-weight: bold;">פרטי תשלום</h3><br><br>
		  <h6 class="panel-title text-right toRight" style="color: red;"> * שדה חובה </h6>
      </div>
    </div>
    <div class="clear"></div>
    <div class="form-group col-8 text-right toRight" >
      <form action="" method="post">

        <fieldset>
          <legend>
          פרטי חשבון העסק:
          </legend>
          <div class="row col-6 toRight">
            <label for="businessNum">מספר עסק*
              <br>
              <input type="number" name="businessNum" id="businessNum">
            </label>
          </div>
          <div class="clear"></div>

          <div class="row col-6 toRight">
            <label for="accountNum">מספר חשבון בנק*
              <br>
              <input type="number" name="accountNum" id="accountNum">
            </label>
          </div>
          <div class="clear"></div>
          <div class="row col-6 toRight">
            <label for="branchNum">מספר סניף*
              <br>
              <input type="number" name="branchNum" id="branchNum">
            </label>
          </div>
        </fieldset>

        <fieldset>
          <legend>מנויים וכרטיסיות:</legend>
          <div class="form-group col-8 text-right toRight" >
            <label for="subscription">
              <input type="checkbox" id="subscription" name="subscription" value="subscription"
                onclick="selectedSection()">מנוי
            </label>
            <br>
            <label for="card">
              <input type="checkbox" id="card" name="card" value="card" onclick="selectedSection()">כרטיסיה
            </label>
          </div>
        </fieldset>
    </div>

    <div class="form-group col-8 text-right toRight" id="subscriptionSection" >
      <fieldset>
        <legend>פרטי המנוי</legend>


        <div class="form-group col-lg-3 text-right toRight">
          <label for="periodTimeSub">לאורך*</label>
            <input type="number" class="form-control input-sm textAlignRight" id="periodTimeSub" name="periodTimeSub">
        </div>

        <div class="form-group col-lg-3 text-right toRight">
            <label for="periodTypeSub">תקופת זמן*</label>
            <select class="form-control input-lg textAlignRight" id="periodTypeSub" name="periodTypeSub" >
                <option value="days"> ימים</option>
                <option value="weeks">שבועות</option>
                <option value="months">חודשים</option>
            </select>
          </div>

        

        <div class="form-group col-lg-3 text-right toRight">
          <label for="priceSub">מחיר*</label>
          <input type="number" class="form-control input-sm textAlignRight" id="priceSub" name="priceSub">
        </div>
      </fieldset>
    </div>

    <div class="form-group col-8 text-right toRight">
      <div id="cardSection">
        <fieldset>
          <legend> פרטי כרטיסיה</legend>

          <div class="form-group col-lg-3 text-right toRight">
            <label for="enterCount">כמות כניסות*</label>

            <input type="number" class="form-control input-sm textAlignRight" id="enterCount" name="enterCount"
              >
            <br>
          </div>

          <div class="form-group col-lg-3 text-right toRight">
              <label for="periodTimeCard">לאורך*</label>
                <input type="number" class="form-control input-sm textAlignRight" id="periodTimeCard" name="periodTimeCard"
                  >
            </div>
    
            <div class="form-group col-lg-3 text-right toRight">
                <label for="periodTypeCard">תקופת זמן*</label>
                <select class="form-control input-lg textAlignRight" id="periodTypeCard" name="periodTypeCard"  >
                    <option value="days"> ימים</option>
                    <option value="weeks">שבועות</option>
                    <option value="months">חודשים</option>
                </select>
             </div>
    
			<div class="form-group col-lg-3 text-right toRight">
            <label for="priceCard">מחיר*</label>
            <input type="number" class="form-control input-sm textAlignRight" id="priceCard" name="priceCard">
          </div>
        </fieldset>
      </div>
      </form>
    </div>
  </section>
  <div class="clear"></div>
  

  


  <section class="container-fluid padding">
  <div class="col-sm-3 toLeft">
    <button onclick="addCardsAndSubscription()" class="btn btn-primary text-center sign_up" style="display: flex; justify-content: center;" value="הוסף מועדון">הוסף מועדון</button>	
    <p id="loginError"></p>
	<p style="text-align: center;"> עמוד 5 מתוך 5 </p>
	</div>
  </section>
  <div class="clear"></div>
  
  
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
  <script src='js/addGym1.js'></script>


  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB82EdqJS456789v80J9--zaL20977ybPYlJGc4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>
  <script>



    function selectedSection() {
      if (document.getElementById("card").checked) {
        document.getElementById("cardSection").style.display = "inline";
      }
      else {
        document.getElementById("cardSection").style.display = "none";
      }
      if (document.getElementById("subscription").checked) {
        document.getElementById("subscriptionSection").style.display = "inline";
      }
      else {
        document.getElementById("subscriptionSection").style.display = "none";
      }
    }

  </script>



</body>

</html>
