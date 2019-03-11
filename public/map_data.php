<?php

require("config.php");
require("database.php");

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

$query = "SELECT * FROM Gyms";
$result=$database->query($query);
if($_POST['type']){
				
				$by_type = $_POST['type'];
				

				
				$conditions = array();

				if(! empty($by_type)) {
				  $conditions[] = 'type="'.$by_type.'"';
				}
				

				$sql = $query;
				if (count($conditions) > 0) {
				  $sql .= " WHERE " . implode(' AND ', $conditions);
				}

				$result=$database->query($sql);
			}
			
			
				


if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
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
  echo 'logo="' .$row['logo'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>