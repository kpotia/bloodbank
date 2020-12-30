
<meta charset="latin">
<?php 
//add Sales
include('connect.php');

session_start();
    // include 'connect.php';
	// $stmt1 = $DB->query('SELECT * FROM city');

	$stmt1 = $DB->query('SELECT * FROM camp');
	


if(isset($_POST['add-city'])){
	extract($_POST);
	// session_start();

	$stmt2 = $DB->query('SELECT bloodGroup FROM users where uid = '.$_POST['donorID']);

	$bloodGroup = $stmt2->fetch();
	$bloodGroup = $bloodGroup['bloodGroup'];
	// var_dump($bloodGroup);
	
	$add_donation = 'INSERT INTO donation(camp,units,dateofdon,donor)
VALUES (:camp,:units,NOW(),:donor) ';
	
	$stmt = $DB->prepare($add_donation);
	
	// $camp will be set by the session of the campmanager
	//bldGroup get from donorid
	
	if($stmt->execute([':camp'=>$_SESSION['BB_MGR']['camp'],':units' => $units,':donor'=>$donorID])){
		
		$donid = $DB->lastInsertId();
		$buid_arr = array();
			while($units>0){
				$sql = 'insert into bloodunit(donation,bloodGroup) VALUES('.$donid.',"'.$bloodGroup.'")';

				$DB->query($sql);
				$units--;
				array_push($buid_arr,$DB->lastInsertId());

			}
				var_dump($buid_arr);
				?>

				<script>
					alert('donnation added');
					window.location = 'donation.php';
				
				</script>

				<?php
			
		// header('location: donation.php');
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php';?>
<body>
	



<div class="w-50 m-auto">

<a href="donation.php" class="mb-3 btn btn-secodary">Back</a>

	<form method=post class='user'>
		<h3>Add Donation</h3>
		
		

	
<div class="form-group">
             <input type="text" class="form-control " required name="donorID" placeholder="Donor ID">
        </div>    		
        	

        <div class="form-group">
             <input type="number" class="form-control " required name="units" placeholder="number of units donated" min="0">
        </div>
        
		<button type="submit" name="add-city" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>