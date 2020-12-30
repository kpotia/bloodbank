

<?php 
//add Sales
include('connect.php');


    // include 'connect.php';
	$stmt = $DB->query('SELECT * FROM region');


if(isset($_POST['add-city'])){
	extract($_POST);
	// session_start();
	
	$add_city = 'INSERT INTO city(c_name,region)
VALUES(:r_name,:rid) ';
	
	$stmt = $DB->prepare($add_city);
	
	if($stmt->execute([':r_name'=>$city,':rid'=>$rid])){
		
		echo 'success';
		header('location: city.php');
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>
<body class="container">


<div class="w-50 m-auto">
	<form method=post class='user'>
		<h3>Add Sale</h3>
		
		<select name="rid">
			<?php
			while($row = $stmt->fetch()){	
		echo '<option ';
		echo 'value = '.$row['rid'].'';
		echo '>'.$row['r_name'].'</option>';	
}
		?>
		</select>
		
		<div class="form-group">
             <input type="text" class="form-control " name="city" placeholder="city">
        </div>		
		<button type="submit" name="add-city" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>