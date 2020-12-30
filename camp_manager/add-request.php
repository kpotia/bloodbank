<meta charset="latin">
<?php 


    include 'connect.php';
    include 'inc/head.php';
	$stmt1 = $DB->query('SELECT * FROM city');

	// $stmt1 = $DB->query('SELECT * FROM camp');
	


if(isset($_POST['add-city'])){
	extract($_POST);
	// session_start();

	// $bloodGroup = $stmt2->fetch();
	// $bloodGroup = $bloodGroup['bloodGroup'];
	
	$request = "INSERT INTO `request` ( `city`, `bloodGroup`, `nb_of_units`) 
	VALUES ( :city, :bloodGroup, :unit)";
	
	$stmt = $DB->prepare($request);

	if($stmt->execute([
		':city'=>$city,
	':bloodGroup'=>$bloodGroup,
	':unit' => $units])){		
		
		header('location: request.php');
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>


<div class="w-50 m-auto">
	<form method=post class='user'>
		<h3>Request</h3>

		<div class="row">
			<select name="city" class="form-control col-5">
				<?php
					while($row = $stmt1->fetch()){	
						echo '<option ';
						echo 'value = '.$row['cid'].'>';
						echo $row['c_name'].'</option>';
					}
				?>
			</select>

			<div class="form-group">
             <select name="bloodGroup" class="form-control">
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

			<div class="form-group col-3">
				<input type="number" class="form-control " name="units" placeholder="units needed" min="0">
			</div>
		</div>

		<button type="submit" name="add-city" class="btn btn-primary">Submit</button>


	</form>
</div>