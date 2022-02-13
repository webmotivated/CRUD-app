<?php
/**
 * This file adds the View_Altar_Servers_Rota template to the Outreach Pro Theme.
 *
 * @author StudioPress
 * @package Outreach Pro
 * @subpackage Customizations
 */

/* Template Name: View_Altar */

echo "<!doctype html>";
echo "<html>";
echo "<head>";
echo "<title>View Altar Servers Rota</title>";
//echo "<meta http-equiv="Content-Type" content="text/html ; charset=utf-8"/>";
echo "</head>";

echo "<body>";
echo "<h1>View Altar Servers Rota</h1>";

		include ('connect-db.php');

		if ($result = $conn->query("SELECT * FROM altar_servers"))
		{
			if ($result->num_rows>0)
			{
				echo "<table border='1' cellpadding = '10'>";
				echo "<tr><th>ID</th><th>rota</th><th>period_label_1</th><th>period_label_2</th><th>year</th><th>month</th><th>day</th><th>time</th><th>details</th><th>name</th></tr>";
				while ($row = $result->fetch_object())
				{
					echo "<tr>";
					echo "<td>" .$row->id. "</td>";
					echo "<td>" .$row->rota. "</td>";
					echo "<td>" .$row->period_label_1. "</td>";
					echo "<td>" .$row->period_label_2. "</td>";
					echo "<td>" .$row->year. "</td>";
					echo "<td>" .$row->month. "</td>";
					echo "<td>" .$row->day. "</td>";
					echo "<td>" .$row->time. "</td>";
					echo "<td>" .$row->details. "</td>";
					echo "<td>" .$row->name. "</td>";
					echo "<td><a href='records.php?id=" .$row->id. "'>Edit</a></td>";
					echo "<td><a href='delete.php?id=" .$row->id. "'>Delete</a></td>";
				}
				echo "</table>";
			}
				else
			{
				echo "No results to display!";
			}	
		
		}
		else 
		{
				echo "Error: " . $mysqli->error;
		}

		$conn->close();
		echo "<a href = 'records.php'>Add new record</a>";
		
		// $stmt = $conn->prepare("SELECT Name FROM altar_servers WHERE rota = 'Altar Servers' AND Year = :year AND Month = :month AND Day = :day AND Time = '06:15' AND Category1 = 2"); 
		// $stmt->execute(array(':year' => $sat_year, ':month' => $sat_mo_name, ':day' => $sat_day));
		// $AS1 = $stmt->fetchColumn();
		// echo $AS1;

?>


</body>
</html>