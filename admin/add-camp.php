
<meta charset="latin">
<?php 
//add Sales
include('connect.php');


    // include 'connect.php';
	$stmt1 = $DB->query('SELECT * FROM region');
	$stmt2 = $DB->query('SELECT * FROM city');


if(isset($_POST['add-city'])){
	extract($_POST);
	// session_start();
	
	$add_city = 'INSERT INTO camp(cp_name,city,region,street,phone)
VALUES
(:cp_name,
	:city,
	:region,
	:street,
	:phone) ';
	
	$stmt = $DB->prepare($add_city);
	
	if($stmt->execute([':cp_name'=>$cp_name,':city'=>$city,':region'=>$region,':street'=>$street,':phone'=>$phone])){
		
		echo 'success';
		header('location: camp.php');
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>

<body class='container'>
<a href="camp.php" class="mb-3">Back</a>

<div class="w-50 m-auto">
	<form method=post class='user'>
		<h3>Add Sale</h3>
		
		<select name="region">
			<?php
			while($row = $stmt1->fetch()){	
				echo '<option ';
				echo 'value = '.$row['rid'].'>';
				echo $row['r_name'].'</option>';	
		}
		?>
		</select>

		<select name="city">
			<?php
			while($row = $stmt2->fetch()){	
		echo '<option ';
		echo 'value = '.$row['cid'].'';
		echo '>'.$row['c_name'].'</option>';	
}
		?>
		</select>
		
		<div class="form-group">
             <input type="text" class="form-control " name="cp_name" placeholder="camp name">
        </div>		
        <div class="form-group">
             <input type="text" class="form-control " name="street" placeholder="street name and house number">
        </div>		
        <div class="form-group">
             <input type="text" class="form-control " name="phone" placeholder="camp phone number">
        </div>			
		<button type="submit" name="add-city" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>

</body>

</html>