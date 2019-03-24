
<?php
    require("config.php");
    require("database.php");
        header('Content-Type: text/html; charset=utf-8');
   
       
    
				if($_POST){
          $type = $_POST["transfer"];
		      if ($type=="card"){
            $error = NULL;
        
            if (!$_POST['count']) {
              $error .= "Error: The count is required.<br>"; }	
            if (!$_POST['validity']) {
              $error .= "Error: The validity is required.<br>"; }
            if (!$_POST['priceCard']) {
              $error .= "Error: The price is required.<br>"; }
            if (!$_POST['place']) {
              $error .= "Error: The place is required.<br>"; }
            if (!$_POST['name']) {
              $error .= "Error: The name is required.<br>"; }
            if (!$_POST['phonenum']) {
              $error .= "Error: The phone is required.<br>"; }
            if ($_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $error .= "Error: Invalid email format.<br>"; } 
            
          
            if (isset($error)) {
              echo '<section style="margin-top:6%">'.$error.'</section>' ;
            }
            else{
              $count=$_POST['count']; 
              $validity=$_POST['validity'];
              $priceCard=$_POST['priceCard'];
              $place=$_POST['place'];
              $name=$_POST['name'];
              $phonenum=$_POST['phonenum'];
              $email=$_POST['email'];
              
              $error=null;
              $sql="insert into `cardTransfer`(`count`,`validity`,`priceCard`,`place`,`name`,`phonenum`,`email`) values('".$count."','".$validity."',".$priceCard.",'".$place."','".$name."','".$phonenum."','".$email."')";
              $result=$database->query($sql);
              if(!$result){
                $error='Can not send message.';
                echo '<section style="margin-top:6%">'.$error.'</section>' ;
              }
            }
        }
			 else if ($type=="subscription"){
            $error = NULL;
        
            if (!$_POST['start']) {
              $error .= "Error: The start is required.<br>"; }	
            if (!$_POST['end']) {
              $error .= "Error: The end is required.<br>"; }
            if (!$_POST['price']) {
              $error .= "Error: The price is required.<br>"; }
            if (!$_POST['place']) {
              $error .= "Error: The place is required.<br>"; }
            if (!$_POST['name']) {
              $error .= "Error: The name is required.<br>"; }
            if (!$_POST['phonenum']) {
              $error .= "Error: The phone is required.<br>"; }
            if ($_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $error .= "Error: Invalid email format.<br>"; } 
            
          
            if (isset($error)) {
              echo '<section style="margin-top:6%">'.$error.'</section>' ;
            }
            else{
              $start=$_POST['start']; 
              $end=$_POST['end'];
              $price=$_POST['price'];
              $place=$_POST['place'];
              $name=$_POST['name'];
              $phonenum=$_POST['phonenum'];
              $email=$_POST['email'];
              
              $error=null;
              $sql="insert into `subscriptionTransfer`(`start`,`end`,`price`,`place`,`name`,`phonenum`,`email`) values('".$start."','".$end."',".$price.",'".$place."','".$name."','".$phonenum."','".$email."')";
              $result=$database->query($sql);
              if(!$result){
                $error='Can not send message.';
                echo '<section style="margin-top:6%">'.$error.'</section>' ;
      
			}
		}
	 }
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
            <a class="nav-link" href="transferForm.php">העברת מנוי/כרטיסייה</a>
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
    <form class="mbr-form " action="transferForm.php" method="post" >

      <div class="form-group col-8 text-right toRight">
	  <fieldset>
	<legend> סוג מנוי</legend>
      <div id="transferType">
        <input type="radio" id="subscription" name="transfer" class="form-group col-2 text-right toRight" value="subscription" onclick="selectedSection()"><label for="subscription">מנוי </label><br>
        <input type="radio" id="card" name="transfer"class="form-group col-2 text-right toRight" value="card" onclick="selectedSection()"><label for="card" >כרטיסיה </label><br>
      </div>
	      
	</fieldset>
	</div>
	  
<div class="form-group col-8 text-right toRight">
<div id="cardSection">
	<fieldset>
	<legend> פרטי כרטיסיה</legend>
      
			<div class="form-group col-2 text-right toRight">
          <label for="numberOf">כמות כניסות</label>

          <select class="form-control input-sm textAlignRight" id="count" name="count" required>
            <option value="1"> 1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
		  <br>
        </div>
		
        <div class="form-group col-2 text-right toRight">
          <label for="validity">תוקף</label>
          <input type="date" class="form-control input-sm textAlignRight" id="validity" name="validity" required >
		  
        </div>

        <div class="form-group col-2 text-right toRight">
          <label for="price"> מחיר</label>
          <input type="number" class="form-control input-sm textAlignRight" id="priceCa" name="priceCard" required>
        </div>

        <div class="form-group col-2 text-right toRight">
          <label for="place">איזור מכירה</label>
          <select class="form-control input-sm textAlignRight" id="place" name="place" required >
            <option value="north"> צפון</option>
            <option value="center">מרכז</option>
            <option value="south">דרום</option>
          </select>
        </div>
    
</fieldset>
</div>

<div id="subscriptionSection">
	<fieldset>
	<legend>פרטי המנוי</legend>
      
			 <div id="subscription">
	  <div class="form-group col-2 text-right toRight">
          <label for="startDate">תאריך התחלה</label>
          <input type="date" class="form-control input-sm textAlignRight" id="startDate" name="start" required>
        </div>

        <div class="form-group col-2 text-right toRight">
          <label for="endDate"> תאריך סיום</label>
          <input type="date" class="form-control input-sm textAlignRight" id="endDate" name="end" required>
        </div>
		

        <div class="form-group col-2 text-right toRight">
          <label for="price"> מחיר</label>
          <input type="number" class="form-control input-sm textAlignRight" id="priceSub" name="price" required>
        </div>

        <div class="form-group col-2 text-right toRight">
          <label for="place">איזור מכירה</label>
          <select class="form-control input-sm textAlignRight" id="place" name="place" required>
            <option value="north"> צפון</option>
            <option value="center">מרכז</option>
            <option value="south">דרום</option>
          </select>
        </div>
    
</fieldset>
</div>
  </div>  
  


		<div class="form-group col-8 text-right toRight">
		<fieldset>
			<legend> פרטי איש קשר</legend>
			<div id="contacts">
			<div class="form-group col-2 text-right toRight">
			<label for="name">שם</label>
			<input type="text" class="form-control input-sm textAlignRight" id="name"  name= "name" placeholder="הזן את שמך" required>
			</div>
			
			<div class="form-group col-2 text-right toRight">
			<label for="phonenum" >מספר טלפון: </label>
			<input id="phonenum" type="tel"  class="form-control input-sm textAlignRight" name="phonenum" pattern="^\d{3}\d{7}$" required >
			</div>
		
			<div class="form-group col-2 text-right toRight">
			<label for="email" >אימייל:</label>
			<input type="email" class="form-control input-sm textAlignRight" name="email" required>
			</div>
		</div>
	  </fieldset>
	  <span class="input-group-btn"><input type="submit" class="btn btn-primary text-center sign_up" value="שלח"/></span>
                  
	  </div>
	  
    </form>
	
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

<script>
  

function selectedSection(){
  if(document.getElementById("card").checked){
    document.getElementById("cardSection").style.display = "inline";
	startDate.removeAttribute('required');
	endDate.removeAttribute('required');
	priceSub.removeAttribute('required');
	place.removeAttribute('required');

	
  }
  else{
    document.getElementById("cardSection").style.display = "none";
	
  }
  if(document.getElementById("subscription").checked){
    document.getElementById("subscriptionSection").style.display = "inline";
	count.removeAttribute('required');
	validity.removeAttribute('required');
	priceCa.removeAttribute('required');
	place.removeAttribute('required');
	
	
  }
  else{
    document.getElementById("subscriptionSection").style.display = "none";
	
  }
}
  </script>


</body>

</html>