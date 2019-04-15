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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
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
	<div class="row padding text-right">
	  <?php
		
	
		header('Content-Type: text/html; charset=utf-8');
      
		$id=$_GET['gymId'];
		$query = "SELECT * FROM Gyms inner Join Logos on Gyms.id=Logos.gymId where Gyms.id=".$id."";
		$result=$database->query($query);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div class="col-lg-2 toRight">';
				$query1 = "SELECT ROUND(AVG(rate), 1) FROM reviews group by gymId having gymId=".$id."";
				$result1=$database->query($query1);
				if ($result1->num_rows > 0) {
			// output data of each row
				while($row1 = $result1->fetch_assoc()) {
									
										echo '<div class="avgStar grow" >';
											echo '<span id="inputTitle1"><br><br><br><h1><b>'.$row1["ROUND(AVG(rate), 1)"].'</b></h1> </span>';
											echo '</div>';
											
				}
			}
				echo '</div>';
				echo '<div class="col-lg-10 grow toRight" id="title">';
				echo '<h1 style="text-shadow:3px 2px #cce0ff"><b>'.$row["name"]."</b></h1>";
				if($row["type"]=="studio"){
						echo "<b><h3>סטודיו</h3></b><br>";
						}
				else if($row["type"]=="gym"){
						echo "<b><h4>חדר כושר</h4></b><br>";
						}
				else {
						echo "<b><h3>בריכה</h3></b><br>";
						}
				echo '<img src="images/GymImg/'.$row["imgName"].'" width="110" class="grow">';
				echo '</div>';
			}
		}
		$query = "SELECT * FROM Gyms inner Join DaysAndHours on Gyms.id=DaysAndHours.gymId where Gyms.id=".$id."";
		$result=$database->query($query);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div class="col-lg-6 text-right toRight" id="main">';
					echo "<p>".$row["description"]."</p><br>";
					echo "<b>ימים ושעות פעילות:</b><br>";
					if($row["Sunday"]==1){
						echo "<b>יום ראשון: </b>".$row["SundayTo"]." - ".$row["SundayFrom"]."<br>";
					}
					if($row["Monday"]==1){
						echo "<b>יום שני: </b>".$row["MondayTo"]." - ".$row["MondayFrom"]."<br>";
					}
					if($row["Tuesday"]==1){
						echo "<b>יום שלישי: </b>".$row["TuesdayTo"]." - ".$row["TuesdayFrom"]."<br>";
					}
					if($row["Wednesday"]==1){
						echo "<b>יום רביעי: </b>".$row["WednesdayTo"]." - ".$row["WednesdayFrom"]."<br>";
					}
					if($row["Thursday"]==1){
						echo "<b>יום חמישי: </b>".$row["ThursdayTo"]." - ".$row["ThursdayFrom"]."<br>";
					}
					if($row["Friday"]==1){
						echo "<b>יום שישי: </b>".$row["FridayTo"]." - ".$row["FridayFrom"]."<br>";
					}
					if($row["Saturday"]==1){
						echo "<b>יום שבת: </b>".$row["SaturdayTo"]." - ".$row["SaturdayFrom"]."<br>";
					}
				echo '</div>';
				}
		}
		$query = "SELECT * FROM Gyms where Gyms.id=".$id."";
		$result=$database->query($query);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div class="col-lg-6 text-right toRight" id="details">';
				echo '<div id="mapGymPage" class="grow"></div>';
					echo "<span class='icon mail '></span>";
					echo "<u>מייל:</u> ".$row["email"]."<br>";
					echo "<span class='icon phone '></span>";
					echo "<u>טלפון:</u> ".$row["phone"]."<br>";
					echo "<span class='icon address '></span>";
					echo "<u>כתובת:</u> ".$row["address"]."<br>";
					echo "<span class='icon exploer '></span>";
					echo "<u>אתר המועדון:</u> <a href=".$row["website"].">קישור לאתר</a><br>";
				
				echo '</div>';
			}
		}
		$query = "SELECT * FROM Gyms inner Join Facilities on Gyms.id=Facilities.gymId inner join Classes on Gyms.id=Classes.gymId where Gyms.id=".$id."";
		$result=$database->query($query);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div class="col-lg-6 text-right toRight">';
					echo '<div class="col-lg-3" id="typeC">';
					echo "<b><u>סוגי חוגים</b></u>";
					echo "<ul>";
					if($row["zumba"]==1){
						echo "<li> זומבה</li>";
					}
					if($row["HIIT"]==1){
						echo "<li> HIIT</li>";
					}
					if($row["TRX"]==1){
						echo "<li> TRX</li>";
					}
					if($row["Yoga"]==1){
						echo "<li> יוגה</li>";
					}
					if($row["Pilatis_mattress"]==1){
						echo "<li> פילאטיס מזרון</li>";
					}
					if($row["Pilatis_Machine"]==1){
						echo "<li> פילאטיס מכשירים</li>";
					}
					if($row["Spinning"]==1){
						echo "<li> ספינינג</li>";
					}
					if($row["kikbox"]==1){
						echo "<li> קיקבוקס</li>";
					}
					if($row["Shaping"]==1){
						echo "<li> עיצוב</li>";
					}
					echo "</ul>";
					echo "</div>";
					echo '<div class="col-lg-3" id="typeF">';
					echo "<b><u>סוגי מתקנים</b></u>";
					echo "<ul>";
					if($row["swimmingPool"]==1){
						echo "<li> בריכת שחיה</li>";
					}
					if($row["spa"]==1){
						echo "<li> ספא</li>";
					}
					if($row["parking"]==1){
						echo "<li> חניה</li>";
					}
					if($row["accessibility"]==1){
						echo "<li> נגישות</li>";
					}
					echo "</ul>"; 
					echo "</div>";
				echo '</div>';
			}
		}
		echo '<div class="col-lg-6 text-right toRight id="typeS">';
		echo "<b><u>סוגי מנויים</b></u><br>";
			$query = "SELECT * FROM Gyms inner Join card on Gyms.id=card.gymId where Gyms.id=".$id."";
			$result=$database->query($query);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<b>פרטי כרטיסיה: </b><br>";
					echo "מספר כניסות: ".$row["enterCount"]."<br>";
					echo "מחיר: ".$row["price"]."<br>";
					echo "משך זמן: ".$row["periodTime"]." ";
					if ($row["priodTime"]=="days"){
						echo "ימים";
					}
					else if ($row["priodTime"]=="weeks"){
						echo "שבועות";
					}
					else{
						echo "חודשים";
					}
				}
				echo "<br><br>";
				
			}
	
			$query = "SELECT * FROM Gyms inner join subscription on Gyms.id=subscription.gymId where Gyms.id=".$id."";
			$result=$database->query($query);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					echo "<b>פרטי מנוי: </b><br>";
					echo "מחיר: ".$row["price"]."<br>";
					echo "משך זמן: ".$row["periodTime"]." ";
					if ($row["priodTime"]=="days"){
						echo "ימים";
					}
					else if ($row["priodTime"]=="weeks"){
						echo "שבועות";
					}
					else{
						echo "חודשים";
					}
				}
			}

		echo '</div>';
		
		?>
		

<div class="col-lg-12 text-right toRight">
<div id="carouselExampleControls" class="carousel slide cars" data-ride="carousel">
  <div class="carousel-inner">
	<?php
		
		$query = "SELECT * FROM Gyms inner Join uploadedimage on Gyms.id=uploadedimage.gymId where Gyms.id=".$id."";
		$result=$database->query($query);
		if ($result->num_rows > 0) {
			// output data of each row
			$flag=1;
			while($row = $result->fetch_assoc()) {
				if($flag==1){
					echo '<div class="carousel-item active">';
					echo '<img class="d-block w-100" src="images/GymImg/'.$row["imagename"].'" >';
				echo '</div>';
				$flag=2;
				}
				else{
					echo '<div class="carousel-item">';
					echo '<img class="d-block w-100" src="images/GymImg/'.$row["imagename"].'" >';
				echo '</div>';
				}
				
					
					
			}
		}			  
	
	?>
				
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
		
	</div>	
	</section>
	<div class="clear"></div>
  <div class="container marginTopLow">
      <div class="row" style="margin-top:40px;">
        <div class="col-md-6">
          <div class="well well-sm">
                <div class="text-right">
                    <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">הוסף ביקורת</a>
                </div>
            
                <div class="row" id="post-review-box" style="display:none;">
                    <div class="col-md-12">
                        <form accept-charset="UTF-8" action="" method="post">
                            <input id="ratings-hidden" name="rating" type="hidden"> 
                            <textarea class="form-control animated textAlignRight" cols="50" id="new-review" name="comment" placeholder="הוסף ביקורת כאן..." rows="5"></textarea>
                            <div class="text-right">
                                <div class="stars starrr" data-rating="0"></div>
                                <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                <span class="glyphicon glyphicon-remove"></span>ביטול</a>
                                <input class="btn btn-success btn-sm" type="submit" name="submitReview" value="שמור">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
             
        </div>
      </div>
		</div>
		
<?php
	if($_POST["submitReview"]){
		$rate=$_POST["rating"];
		$descripiton=$_POST["comment"];
		$sql="INSERT INTO `reviews`(`gymId`, `rate`, `description`) VALUES (".$id.",".$rate.",'".$descripiton."')";
		$result=$database->query($sql);
	}

	$query = "SELECT * FROM `reviews` where gymId=".$id."";
		$result=$database->query($query);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
					echo '<div class="container marginTopLow grow">';
						echo '<div class="row" style="margin-top:40px;">';
							echo '<div class="col-md-9">';
								echo '<div class="ReviewItem">';
									echo '<div class="startest" >';
										echo '<span id="inputTitle1"><br><br><br><h1><b>'.$row["rate"].'</b></h1> </span>';
										echo '</div >';
									
										
									
								
									echo '<div style="width:70%; float:right;margin-right: 10px;padding:30px;">';
										echo "<h3><b>תיאור:</b></h3>";
										echo "".$row["description"]."<br>";
									echo "</div>";
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';		
					echo '<div class="clear"></div>';	
				}	
		}	
?>

		<div class="clear"></div>
    <section class="container-fluid padding">
        <button onclick="window.history.back()" class="btn btn-primary text-center sign_up toRight">חזרה לחיפוש מועדוני כושר</button>
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
	<script src="js/gymPage.js"></script>
	<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB82EdqJSv80J9--zaL2APp17ybPYlJGc4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>
  

</body>

</html>