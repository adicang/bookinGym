<?php

require("init.php");


// Start XML file, create parent node

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}



$query = "SELECT * from `Gyms` a left join (select gymId,avg(rate) as rate from reviews GROUP BY gymId ) b on a.id=b.gymId INNER JOIN Classes ON a.id = Classes.gymId INNER JOIN Facilities ON a.id = Facilities.gymId INNER JOIN Logos ON a.id = Logos.gymId";



	
		$conditions = array();

		if($_GET["gym"]) {
    		  $conditions[] = 'type="gym"';
        }
        if($_GET["pool"]) {
				  $conditions[] = 'type="pool"';
        }
        if($_GET["studio"]) {
				  $conditions[] = 'type="studio"';
        }
        if($_GET["TRX"]) {
				  $conditions[] = 'TRX=1';
        }
        if($_GET["zumba"]) {
				  $conditions[] = 'zumba=1';
        }
        if($_GET["Pilatis_Machine"]) {
				  $conditions[] = 'Pilatis_Machine=1';
        }
        if($_GET["Pilatis_mattress"]) {
				  $conditions[] = 'Pilatis_mattress=1';
        }
        if($_GET["Shaping"]) {
				  $conditions[] = 'Shaping=1';
        }
        if($_GET["HIIT"]) {
				  $conditions[] = 'HIIT=1';
        }
        if($_GET["yoga"]) {
				  $conditions[] = 'yoga=1';
        }
        if($_GET["Spinning"]) {
				  $conditions[] = 'Spinning=1';
        }
        if($_GET["kikbox"]) {
				  $conditions[] = 'kikbox=1';
        }
        if($_GET["swimmingPool"]) {
				  $conditions[] = 'swimmingPool=1';
        }
        if($_GET["spa"]) {
				  $conditions[] = 'spa=1';
        }
        if($_GET["parking"]) {
				  $conditions[] = 'parking=1';
        }
        if($_GET["accessibility"]) {
				  $conditions[] = 'accessibility=1';
        }
        if($_GET["1star"]) {
            $conditions[] = 'rate>1';
        }
        if($_GET["2star"]) {
            $conditions[] = 'rate>2';
        }
        if($_GET["3star"]) {
            $conditions[] = 'rate>3';
        }
        if($_GET["4star"]) {
            $conditions[] = 'rate>4';
        }
        if($_GET["5star"]) {
            $conditions[] = 'rate=5';
        }
				

        $sql = $query;
		if (count($conditions) > 0) {
        		  $sql .= " WHERE " . implode(' AND ', $conditions);
        }
        $sql .= " order by a.name";
              

				$result=$database->query($sql);
					


if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node

echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo 'logo="' .$row['imgName'] . '" ';
  
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>