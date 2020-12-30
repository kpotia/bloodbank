
<meta charset="latin">
<?php 
//add Sales
include('connect.php');


    // include 'connect.php';
	$stmt1 = $DB->query('SELECT * FROM city');


if(isset($_POST['add-city'])){
	extract($_POST);
	// session_start();
	
	$add_city = 'INSERT INTO users(firstname,lastname,bloodGroup,gender,city,email,password,phone)
VALUES
(:firstname,:lastname,:bloodGroup,:gender,:city,:email,:password,:phone) ';
	
	$stmt = $DB->prepare($add_city);
	
	if($stmt->execute([':firstname'=>$firstname,':lastname'=>$lastname,':bloodGroup'=>$bloodGroup,':gender'=>$gender,':city'=>$city,':email'=>$email,':password'=>$password,':phone'=>$phone])){
		
		echo 'success';
		header('location: members.php');		
	}		
	else{echo 'fail due to internal error';}
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>
<body class="container">

<div class="w-50 m-auto">
	<form method=post class='user'>
		<h3>Add User</h3>
		
		

		<select name="city">
			<?php
			while($row = $stmt1->fetch()){	
		echo '<option ';
		echo 'value = '.$row['cid'].'';
		echo '>'.$row['c_name'].'</option>';	
}
		?>
		</select>
		
		<div class="form-group">
             <input type="text" class="form-control " name="firstname" placeholder="firstname">
        </div>		

		<div class="form-group">
             <input type="text" class="form-control " name="lastname" placeholder="lastname">
        </div>	
		<div class="form-group">
             <select name="gender">
			 <option value = >gender</option>
			 <option value = 'male'>Male</option>
             
             	<option value = 'female'>Female</option>
             </select>
        </div>
		<div class="form-group">
             <select name="bloodGroup">
             	<option value = 'O+'>O+</option>
             	<option value = 'O-'>O-</option>
             	<option value = 'A+'>A+</option>
             	<option value = 'B+'>B+</option>
             	<option value = 'AB+'>AB+</option>
             	<option value = 'A-'>A-</option>
             	<option value = 'B-'>B-</option>
             	<option value = 'AB-'>AB-</option>
             </select>
        </div>	
        		
        <div class="form-group">
             <input type="text" class="form-control " name="phone" placeholder="camp phone number">
        </div>	

        <div class="form-group">
             <input type="email" class="form-control " name="email" placeholder="email">
        </div>

        <div class="form-group">
             <input type="password" class="form-control " name="password" placeholder="password">
        </div>		
		<button type="submit" name="add-city" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>