<?php
session_start();
  require_once('include/init.php');
   require_once('include/f-config.php');
   
   $redirectURL="https://adica.mtacloud.co.il/f-callback.php";
   $permissions=['email'];
	$login_url=$helper->getLoginUrl($redirectURL,$permissions);
  ?>
<html lang="heb" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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

  <main>
        <section class="container-fluid padding signInBack">
        <div class="col-lg-5 float-right login ">
          <div class="card mt-5 bg-dark">
            <div class="card-title text-center mt-3 textWhite">
              <h1>הכנס פרטי התחברות</h1>
            </div>
            <div class="card-body textWhite">
            
              <form accept-charset="UTF-8" >
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control textAlignRight" placeholder="שם משתמש" name="username" type="text" id="userName" value="<?php if(isset($_COOKIE['userName'])) echo $_COOKIE['userName']?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control textAlignRight" placeholder="סיסמה" name="password" type="password"  id="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']?>">
                        </div>
                        <div class="checkbox toRight">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me" class="textAlignRight" id="remember"> זכור אותי
                            </label>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="button" value="התחבר" onclick='login()'>
						<input type="button" onclick="window.location='<?php echo $login_url ?>';" value="התחבר באמצעות פייסבוק" class="btn btn-lg btn-facebook btn-block">
           
						
									</fieldset>
									
                    </form>
                    <p id="loginError1"></p>
            </div>
          </div>
        </div>
        </section>
      </main>

 <div class="clear"></div>



 

  <hr>
  
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

  

  
    <script>
            function login(){
                var request=new XMLHttpRequest();
    
                request.onreadystatechange=function(){
                    if (request.readyState==4 & request.status==200){
                        var myObj = JSON.parse(this.responseText);
                        if (myObj.code == 1)
                            window.location.href = "index.php";
                        else
                            document.getElementById("loginError1").innerHTML=myObj.loginError;
                    }
                }
                
                request.open("POST",'include/LoginPHP.php',true);
                request.setRequestHeader('Content-type','application/json');
                var user_data = { 
                  "userName" : document.getElementById("userName").value,
                  "password": document.getElementById("password").value,
                  "rememberMe": document.getElementById("remember").checked,
                }
                
                var data= JSON.stringify(user_data);
                request.send(data);
            }
            
            
            
        
        </script>




</body>

</html>