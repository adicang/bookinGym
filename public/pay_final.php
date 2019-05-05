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
                  <a class="nav-link " href="reg.html"><i class="fa fa-user-plus fa-w-20" aria-hidden="true"></i> |
                    הירשם</a>
                </li>';
            }
          ?>

        </ul>
      </div>
    </nav>
  </header>
  <main>



  <?php



$gymId=$_GET['gymId'];
$userId=$session->get_user_id();
if(isset($_GET['paymentId'])){
  $typePayment="PayPal";
}
else{
  $typePayment="creditCard";
}
$typeId=$_GET['typeId'];
if($typeId==1){
  $type="card";
}
else{
  $type="sub";
}

//get all users details
$sql="SELECT * FROM users WHERE id=".$userId."";
$result=$database->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $user_full_name= $row['FullName'];
    if($row['gender']=="male"){
      $user_gender= "זכר";
    }
    else{
      $user_gender= "נקבה";
    }
    $user_email= $row['email'];
    $user_phone= $row['user_phone'];
  }
}

//get gym and manager details
$sql="SELECT * FROM Gyms INNER JOIN users on Gyms.Manager_id=users.id WHERE Gyms.id=".$gymId."";
$result=$database->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $manager_email= $row['email'];
  $gym_name= $row['name'];
  $gym_phone= $row['phone'];
}
if($type=="card"){
  $sub_type="כרטיסייה";
  $sql="SELECT * FROM Gyms INNER JOIN card on Gyms.id=card.gymId WHERE Gyms.id=".$gymId."";
  $result=$database->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $card_enterCount= $row['card_enterCount'];
    $card_price= $row['price'];
    $card_periodTime= $row['periodTime'];
    if($row['periodType'] == "months"){
      $card_periodType="חודשים";
    }
    else if($row['periodType'] == "weeks"){
      $card_periodType="שבועות";
    }
    else if($row['periodType'] == "days"){
      $card_periodType="ימים";
    }
  }
}
else{
  $sub_type="מנוי";
  $sql="SELECT * FROM Gyms INNER JOIN subscription on Gyms.id=subscription.gymId WHERE Gyms.id=".$gymId."";
  $result=$database->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sub_price= $row['price'];
    $sub_periodTime= $row['periodTime'];
    if($row['periodType'] == "months"){
      $sub_periodType="חודשים";
    }
    else if($row['periodType'] == "weeks"){
      $sub_periodType="שבועות";
    }
    else if($row['periodType'] == "days"){
      $sub_periodType="ימים";
    }
  }
}


//insert transaction audit to database
$sql="INSERT INTO `gymTransactions`(`gymId`, `userId`,`transaction_type`, `payment_type`) VALUES (".$gymId.",".$userId.",'".$type."','".$typePayment."')";
$result=$database->query($sql);

//send confirmation email to the payerUser
$from = "bookinGym@gmail.com";
$to = $user_email;
$subject = "אישור רכישה bookinGym";
$message = '<html lang="HE">
                            <head>
                            </head>
                            <body style="text-align:right; direction:rtl;">
                                <table>
                                    <tr>
                                        <td><h3> תודה על רכישתך באמצעות bookinGym!</h3></td>
                                    </tr>
                                    <tr>
                                        <td>אנא ראה את פרטי הרכישה:</td>
                                    </tr>
                                    <tr>
                                        <td><b>  שם מועדון כושר:  </b>  '.$gym_name.'  </td>
                                    </tr>
                                    <tr>
                                        <td><b> מספר טלפון ליצירת קשר:  </b>  '.$gym_phone.'  </td>
                                    </tr>
                                    <tr>
                                        <td><b> סוג מנוי:  </b>  '.$sub_type.'  </td>
                                    </tr>

                                    <tr>
                                    <tr></tr>
                                    <tr></tr>
                                        <td>בברכה, </td>
                                    </tr>
                                    <tr>
                                        <td>צוות bookinGym</td>
                                    </tr
                                </table>
                            </body>
                        </html>';
                
$headers = "From:" . $from;
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to,$subject,$message, $headers);

//send confirmation email the gym admin
$from = "bookinGym@gmail.com";
$to = $manager_email;
$subject = "מתאמן חדש נוסף למועדון הכושר שלך! bookinGym";
$message = '<html lang="HE">
                            <head>
                            </head>
                            <body style="text-align:right; direction:rtl;">
                                <table>
                                    <tr>
                                        <td><h3> משתמש חדש הצטרף למועדון הכושר שלך!</h3></td>
                                    </tr>
                                    <tr>
                                        <td>אנא ראה את פרטי המתאמן החדש:</td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b>  שם מלא:  </b>  '.$user_full_name.'  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b>  מין:  </b>  '.$user_gender.'  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b>  אימייל:  </b>  '.$user_email.'  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b>  מספר טלפון:  </b>  '.$user_phone.'  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b>  סוג מנוי נרכש:  </b>  '.$sub_type.'  </td>
                                    </tr>
                                    <tr>
                                    <tr></tr>
                                    <tr></tr>
                                        <td>בברכה, </td>
                                    </tr>
                                    <tr>
                                        <td>צוות bookinGym</td>
                                    </tr>
                                </table>
                            </body>
                        </html>';
                
$headers = "From:" . $from;
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to,$subject,$message, $headers);

?>

    <div id='payForGym'>
      <div class="landing-text3">
        <h1 class="home_h1">ביצוע רכישת המנוי הסתיים בהצלחה!</h1>
        <h3 class="home_h3">מעכשיו תוכל להתחיל להתאמן במועדון הכושר!</h3>
        <div class="center">
          <a href="index.php" id="find_gym" class="btn btn-primary text-center sign_up "> חזור לעמוד הבית </a>
        </div>
      </div>
    </div>

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


</body>

</html>