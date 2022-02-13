<?php


//Create & check DB connection (MySQLi)
$servername = '**************************';
$username = '**************************';
$password = '**************************';
$dbname = '**************************';	
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"."<br>"; 

//DB Connection (PDO)
// $servername = '**************************';
// $username = '**************************';
// $password = '**************************';
// $dbname = '**************************';	
// try {
// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// // set the PDO error mode to exception
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// //echo "Connected successfully"."<br>"; 
// } catch(PDOException $e) {    
// echo "Connection failed: " . $e->getMessage();
// }
















//<!-- //snippets
//Manual SQL query which worked: $sql = "SELECT Name FROM `rotas_csv` WHERE Rota = 'Altar Servers' AND Year = 2020 AND Month = 'January' AND Day = 18 AND Time = '06:15' AND Category1 = 1";

//Create & check DB connection (MySQLi)
// $servername = 'm6fc43149440427.db.43149440.bb9.hostedresource.net:3306';
// $username = 'm6fc43149440427';
// $password = 'U8|cPofouii#';
// $dbname = 'm6fc43149440427';	
// $conn = new mysqli($servername, $username, $password, $dbname); 
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully"."<br>"; 

//Cell-specific query (MySQLi)
// $sql = "SELECT Name FROM rotas_csv WHERE rota = 'Altar Servers' AND Year = ? AND Month = ? AND Day = ? AND Time = '06:15' AND Category1 = 1"; // SQL with parameters
// $stmt = $conn->prepare($sql); 
// $stmt->bind_param("isi", $sat_year, $sat_mo_name, $sat_day);
// $stmt->execute();
// $result = $stmt->get_result(); // get the mysqli result
// if ($result->num_rows >0) {
//  while ($row = $result->fetch_assoc()) {echo $row["Name"]."<br>";} //output data of each row
// } else {echo "0 results" . "<br>";}
// -->







