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
  <div id='transfer'>
      <div class="landing-text transfer-padding">
        <h1 class="home_h1">מכירה או קנייה של מנוי/כרטיסייה</h1>    
       </div>
    </div>

<div class="clear"></div>

<section class="container-fluid padding transferPadding">
<a href="transferForm.php" class="btn btn-primary text-center sign_up toRight">להוספת מנוי/כרטיסייה למכירה</a>
</section>
<section class="container-fluid padding transferPadding">
<a href="myTransfer.php" class="btn btn-primary text-center sign_up toRight"> המודעות שלי </a>
</section>

<div class="clear"></div>

<section class="container-fluid padding">

<div class="row col-lg-6 toRight card-title">
  <div style="margin:auto">
  <h1 id="transferTitel">כרטיסיות</h1>
  <form action="transferDisplay.php" method="POST">
  <div class="row col-5 toRight">
				<label>אזור מכירה: <select name="place1" size="1" style="font-size: 20px;">
					<option value="" disabled selected hidden>בחר</option>
					<option value="צפון" <?php if ($_POST['place1'] == 'צפון') echo 'selected="selected"'; ?>> צפון </option>
					<option value ="מרכז" <?php if ($_POST['place1'] == 'מרכז') echo 'selected="selected"'; ?>> מרכז </option>
					<option value ="דרום" <?php if ($_POST['place1'] == 'דרום') echo 'selected="selected"'; ?>> דרום </option>
					</select></label>
			</div>
			<div class="row col-4 toRight">
				<label>עד מחיר:<input type="number" name="upToPrice1" style="display:block; width: 95%;"></label>
		
			</div>
			<div class="row col-1 toRight">
				<button type="submit" value="חפש" id="search" class="btn btn-info searchBtnTransfer" style="margin-right: 20px;">חפש</button>
			</div>
		</form>
</div>
</div>

<div class="row col-lg-6 toRight card-title">
<div style="margin:auto ">
  <h1 id="transferTitel">מנויים</h1>
  <form action="transferDisplay.php" method="POST">
			<div class="row col-5 toRight" >
				<label>אזור מכירה: <select name="place" size="1" style="font-size: 20px;">
					<option value="" disabled selected hidden>בחר</option>
					<option value="צפון" <?php if ($_POST['place'] == 'צפון') echo 'selected="selected"'; ?>> צפון </option>
					<option value ="מרכז" <?php if ($_POST['place'] == 'מרכז') echo 'selected="selected"'; ?>> מרכז </option>
					<option value ="דרום" <?php if ($_POST['place'] == 'דרום') echo 'selected="selected"'; ?>> דרום </option>
					</select></label>
			</div>
			<div class="row col-4 toRight">
				<label>עד מחיר:<input type="number" name="upToPrice" style="display:block; width: 95%;"></label>
		
			</div>
			<div class="row col-1 toRight">
				<button type="submit" value="חפש" id="search" class="btn btn-info searchBtnTransfer" style="margin-right: 20px;">חפש</button>
			</div>
		</form>
</div>
</div>
</section>

  <section class="container-fluid padding">
    <div class="row col-6 toRight" >
   <div style="margin:auto; width:100%;padding-right:20px ;padding-left:20px;">
      
  <?php 	
			
			if($_POST['place1'] || $_POST['upToPrice1']){
				
        $by_place = $_POST['place1'];
        $by_price = $_POST['upToPrice1'];

				$query = "SELECT * FROM cardTransfer inner Join Gyms on cardTransfer.gymId =Gyms.id inner join Logos on Gyms.id=Logos.gymId";
				$conditions = array();

				if(!empty($by_place)) {
				  $conditions[] = 'place="'.$by_place.'"';
        }
        if(!empty($by_price)) {
				  $conditions[] = "priceCard<=".$by_price."";
				}
				
				$sql = $query;
				if (count($conditions) > 0) {
				  $sql .= " WHERE " . implode(' AND ', $conditions);
				}
				$result=$database->query($sql);
      }
      
      
			
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
		
          echo '<div id="item">';
          if($session->get_signed_in() && $row["userId"]==$session->get_user_id()){
            echo '<div class="row" style="padding-right: 30px; padding-top: 5px;"><div style="margin: auto; color: #138496; text-shadow: 0.5px 1px gray;"><h2><b>המודעה שלי</b></h2></div></div>';
          }
          echo '<div style="width:43%; float:right;padding:30px; padding-top: 10px;">';
              
                  echo "<h3><b>פרטי הכרטיסייה:</b></h3>";
				  echo '<div style="font-size:18px;">';
                  echo "<b>שם המועדון:</b> ".$row["name"]."<br>";
                  echo "<b>כמות כניסות:</b> ".$row["count"]."<br>";
                  echo "<b>תוקף:</b> ".$row["validity"]."<br>";
                  echo "<b>מחיר:</b> ".$row["priceCard"]."<br>";
                  echo "<b>איזור מכירה:</b> ".$row["place"]."<br>";
				  echo "</div>";
		echo "</div>";
        echo '<div style="width:30%; float:right;margin-right: 10px;padding:30px; padding-top: 10px;">';
                echo "<h3><b>פרטי המוכר:</b></h3>";
				 echo '<div style="font-size:18px;">';
                echo "<b>שם:</b> ".$row["sellerName"]."<br>";
                echo "<b>מספר טלפון:</b> ".$row["phonenum"]."<br>";
                echo "<b>מייל:</b> ".$row["sellerMail"]."<br>";
				echo "</div>";
              echo "</div>";

              echo '<div style="width:25%; float:right; padding: 10px; padding-top: 10px;">';
    echo '<div style="margin:auto; margin-left: 10px;">';
    echo "<img src='images/GymImg/".$row["imgName"]."' style='float:left' width='60%'>";
    echo "</div>";
   
echo '</div>';
    echo '</div>';
    echo '<div class="clear"></div>';
    
          
        }
      }

         
    
       ?>
      </div>
       </div>
       <div class="row col-6 toRight" >
       <div style="margin:auto; width:100%; padding-left:20px;padding-right:20px;">  
<?php
	if($_POST['place'] || $_POST['upToPrice']){
				
        $by_place = $_POST['place'];
        $by_price = $_POST['upToPrice'];

				$query = "SELECT * FROM subscriptionTransfer inner Join Gyms on subscriptionTransfer.gymId =Gyms.id inner join Logos on Gyms.id=Logos.gymId";
				$conditions = array();

				if(!empty($by_place)) {
				  $conditions[] = 'place="'.$by_place.'"';
        }
        if(!empty($by_price)) {
				  $conditions[] = "price<=".$by_price."";
				}
				
				$sql = $query;
				if (count($conditions) > 0) {
				  $sql .= " WHERE " . implode(' AND ', $conditions);
				}
				$result=$database->query($sql);
			}

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<div id="item">';
    if($session->get_signed_in() && $row["userId"]==$session->get_user_id()){
      echo '<div class="row" style="padding-right: 30px; padding-top: 5px;"><div style="margin: auto; color: #138496; text-shadow: 0.5px 1px gray;"><h2><b>המודעה שלי</b></h2></div></div>';
    }
    echo '<div style="width:45%; float:right; padding-right:15px;padding-top: 10px;">';
    echo "<h3><b>פרטי המנוי:</b></h3> ";
		echo '<div style="font-size:18px;">';
		echo "<b>שם המועדון:</b> ".$row["name"]."<br>";
        echo "<b>תאריך התחלה:</b> ".$row["start"]."<br>";
        echo "<b>תאריך סיום:</b> ".$row["end"]."<br>";
        echo "<b>מחיר:</b> ".$row["price"]."<br>";
        echo "<b>איזור מכירה:</b> ".$row["place"]."<br>";
		echo "</div>"; 
        echo "</div>";  
    echo '<div style="width:35%; float:right;padding:20px; padding-top: 10px;">';
    echo "<h3><b>פרטי המוכר:</b></h3> ";
		echo '<div style="font-size:18px;">';
        echo "<b>שם:</b> ".$row["sellerName"]."<br>";
        echo "<b>מספר טלפון:</b> ".$row["phonenum"]."<br>";
        echo "<b>מייל:</b> ".$row["sellerMail"]."<br>";
		 echo "</div>";  
        echo "</div>";    
    echo '<div style="width:20%; float:right; padding-top: 10px;">';
    echo '<div style="margin:auto;margin-left: 10px;">';
    echo "<img src='images/GymImg/".$row["imgName"]."' style='float:left' width='60%'>";
    echo "</div>";
    echo "</div>";

    echo '</div>';
    echo '<div class="clear"></div>';
   
  }
  
}
?>
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