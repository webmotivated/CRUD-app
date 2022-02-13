<?php
/**
 * This file adds ........... code ......... (as page template) to the Outreach Pro Theme.
 * @author StudioPress
 * @package Outreach Pro
 * @subpackage Customizations
 */
/* Template Name: hospitality process*/
?>

<?php
session_start();

$servername = '**************************';
$username = '**************************';
$password = '**************************';
$dbname = '**************************';
$mysqli = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$rota = '';
$year = '';
$month = '';
$day = '';
$time = '';
$name = '';
$location = '';

if (isset($_POST['save'])){
	$rota = $_POST['rota_form'];
	$year = $_POST['year_form'];
	$month = $_POST['month_form'];
	$day = $_POST['day_form'];
	$time = $_POST['time_form'];
	$name = $_POST['name_form'];
//     $location = $_POST['location'];
    
$mysqli->query("INSERT INTO rotas_data (rota, year, month, day, time, name) VALUES('$rota', '$year', '$month', '$day', '$time', '$name')") or
        die($mysqli->error);
    
$_SESSION['message'] = "Record has been saved!";
$_SESSION['msg_type'] = "success";

header('Location: https://m6f.c42.myftpupload.com/hospitality/');
    
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM rotas_data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header('Location: https://m6f.c42.myftpupload.com/hospitality/');
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM rotas_data WHERE id=$id") or die($mysqli->error());
	//     if (count($result)==1){
	 	   if (is_array($result) && count($result)==1){
	        $row = $result->fetch_array();
			$rota = $row['rota'];
			$year = $row['year'];
			$month = $row['month'];
			$day = $row['day'];
			$time = $row['time'];
			$name = $row['name'];
	     }
}

if (isset($_POST['update'])){
   $id = $_POST['id'];
   $rota = $_POST['rota_form'];
   $year = $_POST['year_form'];
   $month = $_POST['month_form'];
   $day = $_POST['day_form'];
   $time = $_POST['time_form'];
   $name = $_POST['name_form'];
        
	$mysqli->query("UPDATE rotas_data SET rota ='$rota', year='$year', month='$month', day = '$day', time = '$time', name='$name' WHERE id=$id") or
	die($mysqli->error);
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
    header('Location: https://m6f.c42.myftpupload.com/hospitality/');
}