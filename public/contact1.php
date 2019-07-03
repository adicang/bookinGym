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
          <li class="nav-item">
            <a class="nav-link" href="addGym1.php">הוסף מועדון</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="searchGym.php">חפש מועדון</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="transferDisplay.php">העברת מנוי/כרטיסייה</a>
          </li>
          <li class="nav-item active">
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
  <div id='contact'>
      <div class="landing-text contact-padding">
        <h1 class="home_h1">צרו איתנו קשר</h1>    
       </div>
    </div>
  <section class="container-fluid padding">          
<br><h3 style="text-align:center;">הטופס נשלח בהצלחה!</h3>        
		<div class="container">
            <div class="row justify-content-center" dir="rtl">
				
              <div class="media-container-column col-lg-8" data-form-type="formoid">
                  <form class="mbr-form " action="" method="post" >
                    <div class="row row-sm-offset">
                      <div class="col-md-4 multi-horizontal" data-for="name">
                        <div class="form-group">
                          <label class="form-control-label mbr-fonts-style display-7" for="name-form1-v"  style="float:right;">שם</label>
                          <input type="text" class="form-control textAlignRight" name="name" data-form-field="Name" required="" placeholder="שם פרטי ומשפחה" id="name-form1-v">
                        </div>
                      </div>
                      <div class="col-md-4 multi-horizontal" data-for="email">
                        <div class="form-group">
                          <label class="form-control-label mbr-fonts-style display-7" for="email-form1-v"  style="float:right;">מייל</label>
                          <input type="email" class="form-control textAlignRight" name="email" data-form-field="Email" required="" placeholder="כתובת מייל" id="email-form1-v">
                        </div>
                      </div>
                      <div class="col-md-4 multi-horizontal" data-for="phone">
                        <div class="form-group">
                          <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-v"  style="float:right;">טלפון</label>
                          <input type="tel" class="form-control textAlignRight" name="phone" data-form-field="Phone" required="" placeholder="מספר טלפון" id="phone-form1-v">
                        </div>
                      </div>
                    </div>
                    <div class="form-group" data-for="message">
                      <label class="form-control-label mbr-fonts-style display-7" for="message-form1-v"  style="float:right;">נושא הפנייה</label>
                      <textarea type="text" class="form-control textAlignRight" name="message" rows="7" data-form-field="Message" required="" placeholder="פרט כאן את נושא הפניה" id="message-form1-v"></textarea>
                    </div>
              
                    <span class="input-group-btn"><input type="submit" onclick="contactSend()" class="btn btn-primary text-center sign_up" value="שלח הודעה"/></span>
                  </form>
              </div>
            </div>
          </div>
        <br><br>
      </section>

    <?php
   
        header('Content-Type: text/html; charset=utf-8');
        if (!$database->get_connection())
          die("Connection fails <br>");
        if ($_POST){
        $error = NULL;
        if (!$_POST['name']) {
          $error .= "Error: The name is required.<br>"; }	
        if (!$_POST['email']) {
          $error .= "Error: The email is required.<br>"; }
        if ($_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $error .= "Error: Invalid email format.<br>"; } 
        if (!$_POST['phone']) {
          $error .= "Error: The phone is required.<br>"; }
        if (!$_POST['message']) {
          $error .= "Error: The message is required.<br>"; }
    
          
        if (isset($error)) {
          echo '<section style="margin-top:6%">'.$error.'</section>' ;
        }
        else{
          $name=$_POST['name'];
          $mail=$_POST['email'];
          $phone=$_POST['phone'];
          $message=$_POST['message'];
          global $database;
          $error=null;
          $sql="insert into `contact`(`name`,`mail`,`phone`,`message`) values('".$name."','".$mail."','".$phone."','".$message."')";
          $result=$database->query($sql);
          if(!$result){
            $error='Can not send message.';
            echo '<section style="margin-top:6%">'.$error.'</section>' ;
          }
        }
      }
    ?>
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

  
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSy45645G87G87F456c4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>
  
  


</body>

</html>
