
<meta charset="latin">
<?php 
include('connect.php');


    // include 'connect.php';
	$stmt1 = $DB->query('SELECT * FROM camp');
	// $stmt2 = $DB->query('SELECT * FROM city');


if(isset($_POST['add-camp'])){
	extract($_POST);
	// session_start();
	
	$add_city = 'INSERT INTO campmanager(username,password,camp)
VALUES
(:username,:password,:camp) ';
	
	$stmt = $DB->prepare($add_city);
	
	if($stmt->execute([':username'=>$username,':password'=>$password,':camp'=>$camp])){
		
		echo 'success';
		header('location: camp-manager.php');
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>
<body>
	


<div class="w-50 m-auto">

	<a href="camp-manager.php" class="mb-3">Back</a>
	<form method=post class='user'>
		<h3>Assign a manager to a camp</h3>
		
		<select name="camp">
			<?php
			while($row = $stmt1->fetch()){	
				echo '<option ';
				echo 'value = '.$row['cpid'].'>';
				echo $row['cp_name'].'</option>';	
		}
		?>
		</select>

		
		
		<div class="form-group">
             <input type="text" class="form-control " name="username" placeholder="username">
        </div>		
        <div class="form-group">
             <input type="password" class="form-control " name="password" placeholder="password">
        </div>		
		<button type="submit" name="add-camp" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>
</body>
</html>