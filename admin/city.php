<?php
// include_once '../head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT * FROM city INNER JOIN region ON rid = region');?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>
<body class="container">
	<table class='table'>
		<tr>
			<td> ID </td>
			<td>region</td>
			<td>City</td>
		</tr>
	
	<?php
	while($row = $stmt->fetch()){	
		echo '<tr>';
		echo '<td>'.$row['rid'].'</td>';
		echo '<td>'.$row['r_name'].'</td>';	
		echo '<td>'.$row['c_name'].'</td>';	
		echo '</tr>';
	}
		echo "</table>";


} catch(PDOException $e) {
		    echo $e->getMessage();
		}
   	?>