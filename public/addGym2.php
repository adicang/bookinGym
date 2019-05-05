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
      <div class="panel panel-primary toRight col-lg-6" style="margin-right:95px;">
        <div class="panel-heading">
          <h3 class="panel-title text-right toRight" style=" font-weight: bold;">ימים ושעות פעילות</h3>
        </div>
      </div>
    </section>

    <div class="clear"></div>
    <form method="post" enctype="multipart/form-data">  
    <section class="container-fluid padding">   
       <div class="toRight" style="margin-right:100px;">
         <label for="logoUpload" class="imageUpload" id="insertPdf">לחצו על מנת להעלות את לוח החוגים של המועדון</label>
         <input type="file" name="file_array[]" id="logoUpload" accept="application/pdf" style="display: none;" onchange="preview_pdf()">
        </div>
   
    </section>
    </form>

    <script>
$(document).ready(function(){
 $(document).on('change', '#logoUpload', function(){
  var name = document.getElementById("logoUpload").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("logoUpload").files[0]);
  
   form_data.append("file", document.getElementById('logoUpload').files[0]);
   $.ajax({
    url:"include/uploadPdf.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   }); 
 });
});
</script>

    <div class="clear"></div>
    

    <section class="container-fluid padding">
      <div class="col-lg-12 toRight" style="margin-right:100px;">
        <div class="row col-lg-8 text-right">
          <fieldset><strong>בחר את ימי הפעילות: </strong><br><br>
            <div class="clear"></div>


            <input type="checkbox" id="Sunday" name="Sunday" class="regular-checkbox" onclick="showFromTo('Sunday')"><label for="Sunday">ראשון</label>
            <label id="fromSunday" class="fromTo">משעה: <input type="time" id="fromSunday1"> </label>
            <label id="toSunday" class="fromTo">עד שעה: <input type="time" id="toSunday1"> </label>
            <br>
            <input type="checkbox" id="Monday" name="Monday" class="regular-checkbox"
              onclick="showFromTo('Monday')"><label for="Monday">שני</label>
              <label id="fromMonday" class="fromTo">משעה: <input type="time" id="fromMonday1"> </label>
            <label id="toMonday" class="fromTo">עד שעה: <input type="time" id="toMonday1"> </label>
            <br>
            <input type="checkbox" id="Tuesday" name="Tuesday" class="regular-checkbox"
              onclick="showFromTo('Tuesday')"><label for="Tuesday">שלישי</label>
              <label id="fromTuesday" class="fromTo">משעה: <input type="time" id="fromTuesday1"> </label>
              <label id="toTuesday" class="fromTo">עד שעה: <input type="time" id="toTuesday1"> </label>
              <br>
            <input type="checkbox" id="Wednesday" name="Wednesday" class="regular-checkbox"
              onclick="showFromTo('Wednesday')"><label for="Wednesday">רביעי</label>
              <label id="fromWednesday" class="fromTo">משעה: <input type="time" id="fromWednesday1"> </label>
              <label id="toWednesday" class="fromTo">עד שעה: <input type="time" id="toWednesday1"> </label>
          <br>

            <input type="checkbox" id="Thursday" name="Thursday" class="regular-checkbox"
              onclick="showFromTo('Thursday')"><label for="Thursday">חמישי</label>
              <label id="fromThursday" class="fromTo">משעה: <input type="time" id="fromThursday1"> </label>
              <label id="toThursday" class="fromTo">עד שעה: <input type="time" id="toThursday1"> </label>
              <br>

            <input type="checkbox" id="Friday" name="Friday" class="regular-checkbox"
              onclick="showFromTo('Friday')"><label for="Friday">שישי</label>
              <label id="fromFriday" class="fromTo">משעה: <input type="time" id="fromFriday1"> </label>
              <label id="toFriday" class="fromTo">עד שעה: <input type="time" id="toFriday1"> </label>
              <br>

            <input type="checkbox" id="Saturday" name="Saturday" class="regular-checkbox"
              onclick="showFromTo('Saturday')"><label for="Saturday">שבת</label>
              <label id="fromSaturday" class="fromTo">משעה: <input type="time" id="fromSaturday1"> </label>
              <label id="toSaturday" class="fromTo">עד שעה: <input type="time" id="toSaturday1"> </label>
              <br>
          </fieldset>
        </div>
      </div>
    </section>

    <div class="clear"></div>
   <section class="container-fluid padding">
  <div class="col-lg-3 toLeft">
    <button onclick="addDaysAndHours()" class="btn btn-primary text-center sign_up" style="display: flex; justify-content: center;" value="הבא">הבא</button>	
    <p id="loginError"></p>
	<p style="text-align: center;"> עמוד 2 מתוך 5 </p>
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB82EdqJSv80J9--zaL2APp17ybPYlJGc4&libraries=places,geometry&callback=initAutocomplete&language=iw&region=IL"
    async defer></script>




</body>

</html>