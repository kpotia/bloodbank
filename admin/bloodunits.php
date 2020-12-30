<?php
// include_once '../head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT count(*) as countbg,bloodGroup FROM bloodunit  group by bloodGroup');?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>
<body class="container">
	<table class='table'>
		<tr>	
			<td>BloodGroup</td>
			<td>Count</td>
		</tr>
	
	<?php
	while($row = $stmt->fetch()){	
		echo '<tr>';
		echo '<td>'.$row['bloodGroup'].'</td>';
		echo '<td>'.$row['countbg'].'</td>';
		echo '</tr>';
	}
		echo "</table>";
	

} catch(PDOException $e) {
		    echo $e->getMessage();
		}
        // var_dump($row);
        // echo'<br>';
	?>