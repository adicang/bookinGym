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
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  
  
  <title>bookinGym</title>
</head>

<body>
  <header style="">
    <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand" href="index.php">
        <img src="images/13546.jpg" alt=""> bookinGym
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar" >
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
  <main>
    <div id='home'>
      <div class="landing-text ">
        <div class="center" style="margin-bottom: 45px;">
        <h1 class="home_h1">bookinGym</h1>
        <h3 class="home_h3" style="text-shadow: 1px 1px black;">מנוע חיפוש המאגד את כל חדרי הכושר במקום אחד!</h3>
        <div class="form-group col-12 textAlignRight">
          <div class="locationFieldHomePage">
            <div class="center">
              <div class="form-group col-lg-6 text-right toRight padding1">
                <input type="text" class="autocompleteHomePage form-control input-sm textAlignRight" id="autocomplete"  placeholder="הזן כתובת"/>
          </div>
          <div class="form-group col-lg-5 toRight padding1">
                <a href="#" id="find_gym" onclick="onClickFindGym()" class="btn btn-primary text-center sign_up form-control input-sm " >מצא לי מועדון כושר</a>
                </div>
               </div>
          </div>
          </div>
          </div>
        </div>
      
    </div>
    
    <section class="container-fluid padding FirstCo">
      <div class="row about_us text-center">
        <div class="col-12">
          <h1 class="display-4">אודות המערכת</h1>
        </div>
        <hr>
        <div class="col-12">
          <p class="about">bookinGym הינה מערכת אשר מחברת מתאמנים למאגר גדול של מרכזי כושר הכוללים מכוני כושר ומרכזי
            ספורט למיניהם.</p>
          <p class="about">
            באמצעות המערכת, ניתן לחפש ולסנן על פי קטגוריות שונות (כגון מיקום, סוגי אימונים, מתקנים וכו'), להירשם באמצעות
            האתר למועדוני כושר הפרוסים ברחבי הארץ ולהעביר מנויים וכרטיסיות בין משתמשי המערכת.
          </p>
          <p class="about">
            המשימה של bookinGym היא לעזור לאנשים לחוות את עולם הכושר באמצעות השקעה בטכנולוגיות דיגיטליות המסייעות בנטרול
            הקשיים הכרוכים בבחירת מרכז כושר.
          </p>
          <br>
          <a href="contact.php" class="btn btn-primary text-center my_btn" >צור קשר</a>
        </div>
      </div>
    </section>
    <hr>
    <section class="container-fluid padding">
      <div class="row about  text-center padding">
        <div class="col-12">
          <h1 class="display-4">למה לי להתאמן?</h1>
        </div>
      </div>
    </section>
    <section class="container-fluid padding">
      <div class="row padding">
        <div class="col-md-4">
          <article class="card index">
            <img class="card-img-top" src="images/686.jpg">
            <div class="card-body">
              <h4 class="card-title">פחות עייפות יותר אנרגיה</h4>
              <p class="card-text text-right">אנשים שמתאמנים הם אנשים הרבה יותר אנרגתיים, אנשים שמצליחים לתפקד בצורה
                מיטבית לאורך רוב שעות היום, אנשים מרוכזים יותר, שמחים יותר והרבה יותר אופטימיים. הפעילות הגופנית לא רק
                משפיעה על הגוף היא גם משפיעה על הנפש ועל הראש.
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-4">
          <article class="card index">
            <img class="card-img-top" src="images/21383.jpg">
            <div class="card-body">
              <h4 class="card-title">גוף בריא בנפש בריאה</h4>
              <p class="card-text text-right">החיים מביאים איתם המון לחצים ומתח כך שבסוף יום לעתים אנו מוצאים את עצמנו
                עצבניים, טרודים וחושבים יתר על המידה. פעילות גופנית תסייע לשחרר את כל המתח הזה, תרפה את הגוף ותחזיר אתכם
                הביתה הרבה יותר שלווים.
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-4">
          <article class="card index">
            <img class="card-img-top" src="images/545489-PJW07A-562.jpg">
            <div class="card-body">
              <h4 class="card-title">חיזוק של הגוף</h4>
              <p class="card-text text-right">
                ביצוע פעילות גופנית אירובית בשילוב תרגילי כוח מסייע לחזק את השרירים. מסת שריר הינה חשובה הן לשמירה על
                הגוף חזק והן למניעת מחלות. מסת שריר גבוהה גם מסייעת להפחית את הסיכוי לבריחת סידן - אוסטיאופורזיס.
              </p>
            </div>
          </article>
        </div>
        <div class="col-12 text-center">
          <a href="searchGym.php" class="btn btn-primary text-center sign_up ">מצא לי מועדון כושר</a>
        </div>
      </div>
    </section>
    <hr>
    <section class="container-fluid padding">
      <div class="row padding text-right">
        <div class="col-lg-6">
          <h2>העברת מנויים וכרטיסיות</h2>
          <p>
            מחפשים למכור את המנוי שלכם? <br>
            באמצעות המערכת של bookinGym אתם יכולים למצוא מתאמנים שירצו לרכוש מכם את המנוי או הכרטיסייה אותם אתם
            מעוניינים למכור.
          </p>
          <p>
            באמצעות המערכת תוכלו לפרסם במודעה מפורטת את הכרטיסייה או המנוי אותם תרצו למכור או לחילופין לרכוש כרטיסייה או מנוי לטווח קצר או במחיר מוזל יותר!
          </p>
          <br>
          <a href="transferDisplay.php" class="btn btn-primary my_btn">למכירה או קנייה של מנוי/כרטיסייה</a>
        </div>
        <div class="col-lg-6">
          <img src="images/46880.jpg" class="img-fluid">
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
  <script src="js/animations.js">

  </script>
     <script src="js/home.js"></script>
  <script src='./js/autoComplete.js'></script>
  <script src="https://maps.googleapis.com/maps/api/js?key45648NIJOI&libraries=places&callback=initAutocomplete&language=iw&region=IL" async defer></script>
  
</body>

</html>
