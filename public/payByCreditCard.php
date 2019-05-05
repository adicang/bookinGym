<?php
  require_once('include/init.php');
  if (!$session->get_signed_in()){
    header('Location: regOnly.php');
}
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
          <li class="nav-item active">
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
  <div id='payForGym'>
      <div class="landing-text transfer-padding">
        <h1 class="home_h1" style="color: #212529;">רכישת מנוי</h1>    
       </div>
    </div>

<div class="clear"></div>



  <section class="container-fluid padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table">
              <div class="row display-tr">
                <h3 class="panel-title display-td">פרטי תשלום</h3>
                <div class="display-td">
                  <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                </div>
              </div>
            </div>
            <div class="panel-body">
              
                <div class="row ">
                  <div class="col-xs-12">
                    <div class="form-group toRight">
                      <label for="cardNumber" class="textAlignRight">מספר כרטיס אשראי</label>
                      <div class="input-group">
                        <input type="tel" class="form-control textAlignRight" name="cardNumber" id="cardNumber"
                          placeholder="מספר כרטיס אשראי" autofocus />
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                      </div>
					  
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 col-md-6">
                    <div class="form-group">
                      <label for="cardExpiry" class="textAlignRight">תוקף</label>
						<p><input type="tel" class="form-control payCredit" name="cardExpiry" id="YY" placeholder="YY"/>
						<span style= "float: right; font-size: 25px;"> / </span>
						<input type="tel" class="form-control payCredit" name="cardExpiry" id="MM" placeholder="MM"/></p>
                    </div>
					<br><div id="demo1" class="demo"></div>
                  </div>
                  <div class="col-xs-5 col-md-5 pull-right">
                    <div class="form-group">
                      <label for="cardCVC" class="textAlignRight">קוד CVC</label>
                      <input type="tel" class="form-control" name="cardCVC" id="cardCVC" placeholder="קוד CVC"/>
                    </div>
					<div id="demo2" class="demo"></div>
                  </div>
                </div>
                <div class="row">
                <div class="col-xs-5 col-md-8">
                    <div class="form-group">
                      <label for="payerId" class="textAlignRight">תעודת זהות של בעל הכרטיס</label>
                      <input type="tel" class="form-control" name="payerId" id="payerId" placeholder="מספר ת.ז" />
                    </div>
					<div id="demo3" class="demo"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <p><b>סך הכל לתשלום: </b><?php echo $_GET['price']; ?> ש"ח </p>
                  </div>
                </div>
				<div id="demo" class="demo"></div>
                <div class="row">
                  <div class="col-xs-12">
				         <button class="btn btn-success btn-lg btn-block" onclick="payByCreditCard()">ביצוע תשלום</button>
                  </div>
                </div>
                <div class="row" style="display:none;">
                  <div class="col-xs-12">
                    <p class="payment-errors"></p>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  
</section>


<div class="clear"></div>
    <section class="container-fluid padding">
		<div class="container">
			<div class="row toRight">
				<button onclick="window.history.back()" class="btn btn-primary text-center sign_up">ביטול וחזרה לעמוד הקודם</button>
			</div>
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
<script src="js/deleteTransfer.js"></script>

<script>
  function payByCreditCard(){
	var credit = document.getElementById("cardNumber").value;
	var cvc = document.getElementById("cardCVC").value;
	var mm = document.getElementById("MM").value;
	var yy = document.getElementById("YY").value;
	var id = document.getElementById("payerId").value;
	
	if(credit == ""){
		document.getElementById("demo").innerHTML = "אנא הכנס מספר כרטיס אשראי";
	}
	else if(isNaN(credit)){
		document.getElementById("demo").innerHTML = "אנא הזן מספרים בלבד";
	}
	else if(mm == "" || yy == ""){
		
		document.getElementById("demo").innerHTML = "אנא הכנס תוקף"
  }
  else if(mm  != "01" && mm != "02" && mm != "03" && mm != "04" && mm != "05" && mm != "06" && mm != "07" && mm != "08" && mm != "09" && mm != "10" && mm != "11" && mm != "12"){
		
		document.getElementById("demo").innerHTML = "אנא הכנס חודש תקין"
	}
	else if(isNaN(mm) || isNaN(yy)){
		document.getElementById("demo").innerHTML = "אנא הזן מספרים בלבד"
	}
	else if(cvc == ""){
		document.getElementById("demo").innerHTML = "אנא הכנס קוד CVC";
  }
  else if(cvc.length!=3){
		document.getElementById("demo").innerHTML = "קוד CVC צריך לכלול 3 ספרות";
	}
	else if(isNaN(cvc)){
		document.getElementById("demo").innerHTML = "אנא הזן מספרים בלבד";
	}
	else if(id == ""){
		document.getElementById("demo").innerHTML = "אנא הכנס תעודת זהות";
	}
	else if(isNaN(id)){
		document.getElementById("demo").innerHTML = "אנא הזן מספרים בלבד";
	}
	else{
		document.getElementById("demo").innerHTML = "";
		var url_string = window.location.href;
		var url = new URL(url_string);
		var gymId = url.searchParams.get("gymId");
		var typeId = url.searchParams.get("typeId");
		window.location = '/pay_final.php?gymId=' + gymId + '&typeId='+ typeId;
		}
  }
</script>

</body>

</html>