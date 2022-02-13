<?php
/**
 * This file adds ........... code ......... (as page template) to the Outreach Pro Theme.
 * @author StudioPress
 * @package Outreach Pro
 * @subpackage Customizations
 */
/* Template Name: hospitality */
?>

<!-- Load custom stylesheet (enqueued in functions.php) by adding header -->
<?php get_header(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Hospitality Rota</title>

<!-- Off and I think might be to do with "Warning: session_start(): Cannot start session when headers already sent in /var/www/wp-content/themes/outreach-pro/ro_servers_process.php on line 10" -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</head>

<body>
<br>
<h1 style="text-align:center">Hospitality Rota</h1>
<br>
<br>
<?php require_once 'ro_hospitality_process.php'; ?>

<!-- TBC -->
<?php if (isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
    ?>
</div>
<?php endif ?>

<!-- Connect DB -->
<?php
  $servername = '**************************';
  $username = '**************************';
  $password = '**************************';
  $dbname = '**************************';
  $mysqli = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM rotas_data where rota = 'hospitality'") or die($mysqli->error);
?>
      
<!--Table headers-->
<div>
<table class="rota_tables">
<thead>
<tr>
    <th style="text-align:left">Name</th>
    <th>Month</th>
    <th>Day</th>
	<th>Year</th>
    <th>Time</th>
	<th style="height:60px">Rota</th>
    <th colspan="2" tyle="text-align:center">Action</th>
</tr>
</thead>

<!--Table data-->
<?php
  while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td style="text-align:left"><?php echo $row['name']; ?></td>
      <td><?php echo $row['month']; ?></td>
	  <td><?php echo $row['day']; ?></td>
	  <td><?php echo $row['year']; ?></td>
      <td><?php echo date('H:i',strtotime($row['time'])); ?></td> 
      <td><?php echo $row['rota']; ?></td>
      <td>
      <a class="button_edit" href="https://m6f.c42.myftpupload.com/hospitality/?edit=<?php echo $row['id']; ?>">Edit</a>
      <a class="button_delete" href="https://m6f.c42.myftpupload.com/hospitality-process/?delete=<?php echo $row['id']; ?>">Delete</a>
      </td>
    </tr>
 <?php endwhile; ?>    
</table>
</div>

<br>
<br>
         
<!--Form-->
<form id="forma" class="form-inline" action="https://m6f.c42.myftpupload.com/hospitality-process/" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="text" name="name_form" value="<?php echo $name; ?>" placeholder="Enter name">
<select name="month_form" required>
<option value="" disabled selected>Select Month</option>
    <option value="Jan">Jan</option>
    <option value="Feb">Feb</option>
    <option value="Mar">Mar</option>
    <option value="Apr">Apr</option>
    <option value="May">May</option>
    <option value="Jun">Jun</option>
    <option value="Jul">Jul</option>
    <option value="Aug">Aug</option>
    <option value="Sep">Sep</option>
    <option value="Oct">Oct</option>
    <option value="Nov">Nov</option>
    <option value="Dec">Dec</option>
</select>
<select name="day_form" required>
<option value="" disabled selected>Select Day</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
</select>
<select name="year_form" required>
    <option value="" disabled selected>Select Year</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
</select>
<select name="time_form" required>
    <option value="" disabled selected>Select Time</option>
    <option value="09:30">09:30</option>
    <option value="11:15">11:15</option>
    <option value="18:15">18:15</option>
</select>
<select name="rota_form" required>
    <option value="" disabled selected>Select Rota</option>
    <option value="Hospitality">Hospitality</option>
</select>





<?php 
if ($update == true): 
?>
    <button type="submit" class="button_save" name="update">Update</button>
    <?php else: ?>
    <button type="submit" class="button_save" name="save">Save</button>
<?php endif; ?>
</form>
  
	
	
</body>