

<?php 
//add Sales
include('connect.php');

if(isset($_POST['add-region'])){
	extract($_POST);
	// session_start();
	
	$add_region = 'INSERT INTO region(r_name)
VALUES(:r_name) ';
	
	$stmt = $DB->prepare($add_region);
	
	if($stmt->execute([':r_name'=>$region])){
		
		echo 'success';
		header('location: region.php');
		
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
		
		
		<div class="form-group">
             <input type="text" class="form-control " name="region" placeholder="Region">
        </div>		
		<button type="submit" name="add-region" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>