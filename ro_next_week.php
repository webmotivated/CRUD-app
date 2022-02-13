<?php
/**
 * This file adds ........... code ......... (as page template) to the Outreach Pro Theme.
 * @author StudioPress
 * @package Outreach Pro
 * @subpackage Customizations
/* Template Name: rotas next week */
?>

<!-- Load custom stylesheet (enqueued in functions.php) by adding header -->
<?php get_header(); ?>
<!-- Connect DB -->
<?php
//   $servername = '**************************';
//   $username = '**************************';
//   $password = '**************************';
//   $dbname = '**************************';
//   $mysqli = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($mysqli));
//   $result = $mysqli->query("SELECT * FROM rotas_data where rota = 'altar servers'") or die($mysqli->error);

//DB Connection (PDO)
$servername = '**************************';
$username = '**************************';
$password = '**************************';
$dbname = '**************************';  
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected successfully"."<br>"; 
} catch(PDOException $e) {    
echo "Connection failed: " . $e->getMessage();
}

?>



	
<?php
// Date stuff
$NextSundayDate = date('Y-m-d', strtotime('next sunday'));
$NextSaturdayDate = date('Y-m-d', strtotime('-1 day', strtotime($NextSundayDate)));
list($next_sun_year, $next_sun_mo, $next_sun_day) = explode("-", $NextSundayDate); //Explode the date into separate vars (SUN)
$next_sun_mo_num = ltrim($next_sun_mo, "0");
$next_sun_day_num = ltrim($next_sun_day, "0");
$next_sun_mo_name = date('M', mktime(0, 0, 0, $next_sun_mo_num, 10));
list($next_sat_year, $next_sat_mo, $next_sat_day) = explode("-", $NextSaturdayDate); //Explode the date into separate vars (SAT)
$next_sat_mo_num = ltrim($next_sat_mo, "0");
$next_sat_mo_name = date('M', mktime(0, 0, 0, $next_sat_mo_num, 10));
	
// echo "Next SAT date:  ".$NextSaturdayDate ."<br>";	
// echo "Next SUN date:  ".$NextSundayDate ."<br>";	
// echo "Next SAT month name:  ".$next_sat_mo_name ."<br>";
// echo "Next SUN month name:  ".$next_sun_mo_name ."<br>";


//Altar Server (18:15)
$stmt = $conn->prepare("SELECT name FROM rotas_data WHERE rota = 'Altar Servers' AND Year = :year AND Month = :month AND Day = :day AND Time = '18:15'"); 
$stmt->execute(array(':year' => $next_sun_year, ':month' => $next_sun_mo_name, ':day' => $next_sun_day_num));
$AS_18_15 = $stmt->fetchColumn();
//Altar Server  (09:30)
$stmt = $conn->prepare("SELECT name FROM rotas_data WHERE rota = 'Altar Servers' AND Year = :year AND Month = :month AND Day = :day AND Time = '09:30'"); 
$stmt->execute(array(':year' => $next_sun_year, ':month' => $next_sun_mo_name, ':day' => $next_sun_day_num));
$AS_09_30 = $stmt->fetchColumn();
//Altar Server  (11:15)
$stmt = $conn->prepare("SELECT name FROM rotas_data WHERE rota = 'Altar Servers' AND Year = :year AND Month = :month AND Day = :day AND Time = '11:15'"); 
$stmt->execute(array(':year' => $next_sun_year, ':month' => $next_sun_mo_name, ':day' => $next_sun_day_num));
$AS_11_15 = $stmt->fetchColumn();

//Hospitality (18:15)
$stmt = $conn->prepare("SELECT name FROM rotas_data WHERE rota = 'Hospitality' AND Year = :year AND Month = :month AND Day = :day AND Time = '18:15'"); 
$stmt->execute(array(':year' => $next_sun_year, ':month' => $next_sun_mo_name, ':day' => $next_sun_day_num));
$HO_18_15 = $stmt->fetchColumn();
//Hospitality  (09:30)
$stmt = $conn->prepare("SELECT name FROM rotas_data WHERE rota = 'Hospitality' AND Year = :year AND Month = :month AND Day = :day AND Time = '09:30'"); 
$stmt->execute(array(':year' => $next_sun_year, ':month' => $next_sun_mo_name, ':day' => $next_sun_day_num));
$HO_09_30 = $stmt->fetchColumn();
//Hospitality   (11:15)
$stmt = $conn->prepare("SELECT name FROM rotas_data WHERE rota = 'Hospitality' AND Year = :year AND Month = :month AND Day = :day AND Time = '11:15'"); 
$stmt->execute(array(':year' => $next_sun_year, ':month' => $next_sun_mo_name, ':day' => $next_sun_day_num));
$HO_11_15 = $stmt->fetchColumn();


?>



<!DOCTYPE html>
<html>
<head>
<title>Rotas Next Week</title>
</head>
<body>
<br>
<h1 style="text-align:center">Rotas Next Week</h1>
<br><br>


<!--Table 1-->
<div>
<table class="rota_tables">
<thead>
<tr>
    <th style="text-align:left">Rota</th>
    <th></th>
    <th>18:15</th>
	<th>09:30</th>
    <th style="height:60px">11:15</th>
</tr>
</thead>

<!--Table data-->
<tr>
    <td style="text-align:left">Altar Servers</td>
    <td></td>
	<td><?php echo $AS_18_15; ?></td>
	<td><?php echo $AS_09_30; ?></td>
    <td><?php echo $AS_11_15; ?></td> 
</tr>
<tr>
    <td style="text-align:left">Hospitality</td>
    <td></td>
	<td><?php echo $HO_18_15 ; ?></td>
	<td><?php echo $HO_09_30; ?></td>
    <td><?php echo $HO_11_15; ?></td> 
</tr>
</table>
</div>
	
<!--Table 2-->
<!-- <div>
<table style="width:100%" class="rota_tables">
  <tr>
	<th style="height:60px">Rota</th>
    <th></th>
	<th>18:15</th>
	<th>09:30</th>
    <th>11:15</th>
  </tr>
  <tr>
    <td>Altar Servers</td>
    <th></th> 
	<th><?php echo $AS_18_15; ?></th>
	<th><?php echo $AS_09_30; ?></th>
    <td><?php echo $AS_11_15; ?></td>
  </tr>
  <tr>
    <td>Hospitality</td>
    <th></th>
	<th><?php echo $HO_18_15 ; ?></th>
	<th><?php echo $HO_09_30; ?></th>
	<td><?php echo $HO_11_15; ?></td>
  </tr>
</table>
</div> -->

	
<!-- //////Close DB connection
<?php
$conn=null;
?>


<!------- SMTH ELSE ------->
	
	
<!-- // week number next Sunday
$nextSunday = strtotime('next sunday');
$weekNo = date('W');
$weekNoNextSunday = date('W', $nextSunday);
//echo "Week no of next SUN:  ".$weekNoNextSunday ."<br>";
//if ($weekNoNextSunday != $weekNo) {
//past Sunday
//} -->
	
<!-- //[foobar]
function foobar_func( $atts ){
  return "foo and bar";
}
add_shortcode( 'foobar', 'foobar_func' ); -->


<!-- //Retrieve Ninja Forms Data
$form_id = 2; // Get all submissions for that form ID
$submissions = Ninja_Forms()->form( $form_id )->get_subs();
if ( is_array( $submissions ) && count( $submissions ) > 0 ) {
   $latest_submission = reset( $submissions ); //Get first element of array; latest submission
   $ninja_date_picked = $latest_submission->get_field_value( 'week_commencing_day' ); //To get/display single value
   echo "Picked W/C date is:  ".$ninja_date_picked."<br>"; //needs to be Monday!
} -->

<!-- //Saturday date identified when Monday date = ninja_date_picked.
//Data validation (month name)
$mon_date = DateTime::createFromFormat('Y-m-d', $ninja_date_picked)->format('Y-m-d'); // able to convert yyyy/mm/dd into yyyy-mm-dd if required. used for different purpose here. 
$date = new DateTime(date($mon_date));
$date->modify('+5 day');
$sat_date = $date->format('Y-m-d');
echo "Next Saturday date is:  ".$sat_date."<br>"; 
list($sat_year, $sat_mo_num, $sat_day) = explode("-", $sat_date); //Explode the date into separate vars
$sat_mo_num = ltrim($sat_mo_num, "0");
$sat_mo_name = date('M', mktime(0, 0, 0, $sat_mo_num, 10));
echo "Saturday month:  ".$sat_mo_name."<br>";
echo "Saturday day:  ".$sat_day."<br><br>"; -->
