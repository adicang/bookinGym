<?php
	
	require_once('includes/init.php');
	

    if (!$session->get_signed_in()){
        header('Location: signIn.php');
    }
    
    $user_id=$session->get_user_id();
	$output1='שלום '.$user_id;
	$output2='התנתק';
    

?>
<!DOCTYPE html>
<html lang="he">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="images/4-180x152.png" type="image/x-icon">
  <title>עמותת הכלבים שבצל</title>
  <link rel="stylesheet" type="text/css" href="myStyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
</head>
<body dir="rtl">
<script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.2.js"></script>
   

<div class="navSection">
   <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-light">
	
        <div class="container-fluid">
            <ul class="navbar-nav navbar-right">
				<li class="nav-item active">
					<a class="nav-link" href="MainPage.php">עמוד הבית  <span class="icon home"></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="Foster.php">אומנה <span class="icon dog"></span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="successStory.php">סיפור הצל(ח)ה <span class="icon magic"></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="adoption.php">אמצו חבר <span class="icon like"></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="ConnectionPage.php">צרו קשר <span class="icon contact"></a>
				</li>
			</ul>
			
			 <ul class="nav navbar-nav navbar-left">
			  <li><a class="nav-link" href="registration.php"> הירשמו <img src="images/user2.png"width="30" height="30" class="d-inline-block align-top"></a></li>
			  <li><a class="nav-link" href="signIn.php"> <?php echo $output1 ?> <img src="images/user1.png" width="30" height="30" class="d-inline-block align-top"></a></li>
			  <li><a class="nav-link" href="includes/logout.php" > <?php echo $output2 ?> </a></li>
			</ul>
            	</div>
        
    </nav>
</div>

<section>
	<div class="container" data-aos="fade-up" data-aos-duration="2000">
		<h1 class="toRight"> כלבים שמתאימים להעדפות שלך! </h1>
	</div>
</section>
<div class="clear"></div>
<?php 	
			
			$user_id=$session->get_user_id();
			$result=$database->query("SELECT * FROM `RegisteredUsers` WHERE username = '".$user_id."'");
				$row = $result->fetch_assoc();
				$favoriteSex=$row["favoriteSex"];
				$favoriteSize=$row["favoriteSize"];
				$favoriteAge=$row["favoriteAge"];
				$query = "SELECT * FROM dogs where sex='".$favoriteSex."' and size='".$favoriteSize."' and age='".$favoriteAge."'";
				$result=$database->query($query);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<div id="item" data-aos="fade-up" data-aos-duration="2000">';
							echo '<div id="itemText">';
								echo "<b>שם הכלב:</b> ".$row["name"]."<br>";
								echo "<b>מין הכלב:</b> ".$row["sex"]."<br>";
								echo "<b>גודל הכלב:</b> ".$row["size"]."<br>";
								echo "<b>גיל הכלב:</b> ".$row["age"]."<br>";
							echo '</div>';
							
							echo '<div id="itemImg">';
								echo '<img src="images/'.$row["image"].'" width="70%" height="210">';
							echo '</div>';
						echo '</div>';
					}
				}
?>			

<div class="clear"></div>
<section>
	<div class="container" data-aos="fade-up" data-aos-duration="2000">
		<h1 class="toRight"> חפש את החבר החדש שלך ממגוון הכלבים שיש בעמותה! </h1>
		<div class="clear"></div>
		<form action="adoption.php" method="POST">
			<div class="row col-3 toRight">
				<label>מין הכלב: <select name="sex" size="1">
					<option value="" disabled selected hidden>בחר</option>
					<option value="זכר" <?php if ($_POST['sex'] == 'זכר') echo 'selected="selected"'; ?>> זכר </option>
					<option value ="נקבה" <?php if ($_POST['sex'] == 'נקבה') echo 'selected="selected"'; ?>> נקבה </option>
					</select></label>
			</div>
			<div class="row col-3 toRight">
				<label>גודל הכלב: <select name="size" size="1">
					<option value="" disabled selected hidden>בחר</option>
					<option value="קטן" <?php if ($_POST['size'] == 'קטן') echo 'selected="selected"'; ?>> קטן </option>
					<option value ="בינוני" <?php if ($_POST['size'] == 'בינוני') echo 'selected="selected"'; ?>> בינוני </option>
					<option value ="גדול" <?php if ($_POST['size'] == 'גדול') echo 'selected="selected"'; ?>> גדול </option>
					</select></label>
			</div>
			<div class="row col-3 toRight">
				<label>גיל הכלב: <select name="age" size="1">
					<option value="" disabled selected hidden>בחר</option>
					<option value="גור" <?php if ($_POST['age'] == 'גור') echo 'selected="selected"'; ?>> גור </option>
					<option value ="בוגר" <?php if ($_POST['age'] == 'בוגר') echo 'selected="selected"'; ?>> בוגר </option>
					<option value ="מבוגר" <?php if ($_POST['age'] == 'מבוגר') echo 'selected="selected"'; ?>> מבוגר </option>
					</select></label>
			</div>
			<div class="row col-3 toRight">
				<button type="submit" value="חפש" id="searchDogButton">חפש</button>
				
			</div>
		</form>
</div>
	

</section>
<div class="clear"></div>
<section id="secDogs">
	<?php 	
			
		
			
			if($_POST['sex'] || $_POST['size'] || $_POST['age']){
				
				$by_sex = $_POST['sex'];
				$by_size = $_POST['size'];
				$by_age = $_POST['age'];

				$query = "SELECT * FROM dogs";
				$conditions = array();

				if(! empty($by_sex)) {
				  $conditions[] = 'sex="'.$by_sex.'"';
				}
				if(! empty($by_size)) {
				  $conditions[] = 'size="'.$by_size.'"';
				}
				if(! empty($by_age)) {
				  $conditions[] = 'age="'.$by_age.'"';
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
						echo '<div id="item" data-aos="fade-up" data-aos-duration="2000">';
							echo '<div id="itemText">';
								echo "<b>שם הכלב:</b> ".$row["name"]."<br>";
								echo "<b>מין הכלב:</b> ".$row["sex"]."<br>";
								echo "<b>גודל הכלב:</b> ".$row["size"]."<br>";
								echo "<b>גיל הכלב:</b> ".$row["age"]."<br>";
							echo '</div>';
							
							echo '<div id="itemImg">';
								echo '<img src="images/'.$row["image"].'" width="70%" height="210">';
							echo '</div>';
						echo '</div>';
					}
				}

        ?>
</section>

<div class="clear"></div>
<section>
	<div class="container" data-aos="fade-up" data-aos-duration="2000">
		<h1 class="toRight"> ראו העדפות של משתמשים אחרים! </h1>
	</div>
	<div class="clear"></div>
	<div id="piechart1" class="toRight" data-aos="fade-up" data-aos-duration="2000"></div>
	<div id="piechart2" class="toRight" data-aos="fade-up" data-aos-duration="2000"></div>
	<div id="piechart3" class="toRight" data-aos="fade-up" data-aos-duration="2000"></div>
	
</section>

<script type="text/javascript">
<?php

$male=user::get_field_from_all_users("favoriteSex","זכר");
$female=user::get_field_from_all_users("favoriteSex","נקבה");
$small=user::get_field_from_all_users("favoriteSize","קטן");
$medium=user::get_field_from_all_users("favoriteSize","בינוני");
$large=user::get_field_from_all_users("favoriteSize","גדול");
$puppy=user::get_field_from_all_users("favoriteAge","גור");
$adult=user::get_field_from_all_users("favoriteAge","בוגר");
$old=user::get_field_from_all_users("favoriteAge","מבוגר");
?>
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['זכר', <?php echo $male ?>],
  ['נקבה', <?php echo $female ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'מין כלב מועדף', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
  chart.draw(data, options);
  
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['קטן', <?php echo $small ?>],
  ['בינוני', <?php echo $medium ?>],
  ['גדול', <?php echo $large ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'גודל כלב מועדף', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
  
   
  
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['גור', <?php echo $puppy ?>],
  ['בוגר', <?php echo $adult ?>],
  ['מבוגר', <?php echo $old ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'גיל כלב מועדף', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
  chart.draw(data, options);
}
</script>
<br><br>
<div class="clear"></div>


	<section class="footer">
		<div class="container-fluid">
			<div class="media-container-row align-center mbr-white">
				<div class="col-12">
					<p class="mbr-text mb-0 mbr-fonts-style display-7"></p>
					<div style="direction: rtl;"><strong>תרומות לעמותה</strong></div><div style="direction: rtl;"><span style="font-size: 1rem;">לתרומות לחשבון הבנק של העמותה:&nbsp;</span></div><div style="direction: rtl;"><span style="font-size: 1rem;">בנק לאומי - סניף 624 - חשבון&nbsp;40105502 - מוטב "למען הכלבים שבצל"</span></div><p></p>
				</div>
			</div>
		</div>
		
	</section>
	
<script>
	AOS.init();
</script>


</body>

</html>
