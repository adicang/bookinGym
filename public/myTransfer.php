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
        <h1 class="home_h1">המודעות שלי</h1>    
       </div>
    </div>

<div class="clear"></div>



  <section class="container-fluid padding">
  <div class="row col-7 toRight">
    <?php
				$sql = "SELECT * FROM cardTransfer inner Join Gyms on cardTransfer.gymId =Gyms.id inner join Logos on Gyms.id=Logos.gymId where cardTransfer.userId='".$session->get_user_id()."'";
				$result=$database->query($sql);	
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		
          echo '<div id="item">';
		 
          echo '<div style="width:30%; float:right;padding:30px;">';
           
                  echo "<h3><b>פרטי הכרטיסייה:</b></h3>";
				  echo '<div style="font-size:18px;">';
				  
                  echo "<b>שם המועדון:</b> ".$row["name"]."<br>";
                  echo "<b>כמות כניסות:</b> ".$row["count"]."<br>";
                  echo "<b>תוקף:</b> ".$row["validity"]."<br>";
                  echo "<b>מחיר:</b>".$row["priceCard"]."<br>";
                  echo "<b>איזור מכירה:</b> ".$row["place"]."<br>";
				  echo "</div>";
		echo "</div>";
        echo '<div style="width:30%; float:right;margin-right: 10px;padding:30px;">';
                echo "<h3><b>פרטי המוכר:</b></h3>";
				 echo '<div style="font-size:18px;">';
                echo "<b>שם:</b> ".$row["sellerName"]."<br>";
                echo "<b>מספר טלפון:</b> ".$row["phonenum"]."<br>";
                echo "<b>מייל:</b> ".$row["sellerMail"]."<br>";
				echo "</div>";
              echo "</div>";

              echo '<div style="width:20%; float:right;padding:30px;">';
    echo '<div style="margin:auto; margin-left: 10px;">';
    echo "<img src='images/GymImg/".$row["imgName"]."' style='float:left' width='60%'>";
    echo "</div>";
    echo "</div>";
    echo '<div style="width:20%; float:left;padding-right: 70px;">';
    echo "<button class='btn btn-info' onclick='removeCardTransfer(".$row["cardTransfer_id"].")'> מחק מודעה</button>";
    echo '</div>';
    echo "</div>";
   
        }
      }
	
   
  

				$query = "SELECT * FROM subscriptionTransfer inner Join Gyms on subscriptionTransfer.gymId =Gyms.id inner join Logos on Gyms.id=Logos.gymId where subscriptionTransfer.userId='".$session->get_user_id()."'";
				
				
				$sql = $query;
				
				$result=$database->query($sql);
			

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<div id="item">';
    echo '<div style="width:30%; float:right;padding:30px;">';
    echo "<h3><b>פרטי המנוי:</b></h3> ";
		echo '<div style="font-size:18px;">';
		echo "<b>שם המועדון:</b> ".$row["name"]."<br>";
        echo "<b>תאריך התחלה:</b> ".$row["start"]."<br>";
        echo "<b>תאריך סיום:</b> ".$row["end"]."<br>";
        echo "<b>מחיר:</b> ".$row["price"]."<br>";
        echo "<b>איזור מכירה:</b> ".$row["place"]."<br>";
		echo "</div>"; 
        echo "</div>";  
        echo '<div style="width:30%; float:right;margin-right: 10px;padding:30px;">';
        echo "<h3><b>פרטי המוכר:</b></h3> ";
		echo '<div style="font-size:18px;">';
        echo "<b>שם:</b> ".$row["sellerName"]."<br>";
        echo "<b>מספר טלפון:</b> ".$row["phonenum"]."<br>";
        echo "<b>מייל:</b> ".$row["sellerMail"]."<br>";
		 echo "</div>";  
        echo "</div>";    
    echo '<div style="width:20%; float:right; padding:30px;">';
    echo '<div style="margin:auto;margin-left: 10px;">';
    echo "<img src='images/GymImg/".$row["imgName"]."' style='float:left' width='60%'>";
    echo "</div>";
    
    echo "</div>";

    echo '<div style="width:20%; float:left;padding-right: 70px;">';
    echo "<button class='btn btn-info' onclick='removeSubTransfer(".$row["subTransferId"].")'> מחק מודעה</button>";
    echo '</div>';
    echo "</div>";

    echo '<div class="clear"></div>';
   
  }
  
}
?>

     </div>
      
  </section>

  
  <div class="clear"></div>
    <section class="container-fluid padding">
        <button onclick="window.history.back()" class="btn btn-primary text-center sign_up toRight">חזרה להצגת כל המודעות</button>
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
  
  
  
<script src="js/deleteTransfer.js"></script>

</body>

</html>