<meta charset="latin">
<?php 


    include 'connect.php';
    include 'inc/head.php';
	// $stmt1 = $DB->query('SELECT * FROM city');

	$stmt1 = $DB->query('SELECT * FROM camp');
	


if(isset($_POST['add-city'])){
	extract($_POST);
	// session_start();

	$stmt2 = $DB->query('SELECT bloodGroup FROM users where uid = '.$_POST['donorID']);

	$bloodGroup = $stmt2->fetch();
	$bloodGroup = $bloodGroup['bloodGroup'];
	
	$request = "INSERT INTO `request` ( `city`, `region`, `requester`, `bloodGroup`, `nb_of_units`, `status`, `response`) VALUES ( :city, :region, :requester, :bloodGroup, :unit, '0', NULL)";
	
	$stmt = $DB->prepare($request);

	if($stmt->execute([':camp'=>$camp,':units' => $units,':donor'=>$donorID])){		
		$donid = $DB->lastInsertId();
		$buid_arr = array();
			while($units>0){
				$sql = 'insert into bloodunit(donation,bloodGroup) 
				VALUES('.$donid.',"'.$bloodGroup.'")';

				$DB->query($sql);$units--;
				array_push($buid_arr,$DB->lastInsertId());
			}var_dump($buid_arr);			
		header('location: request.php');
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>


<div class="w-50 m-auto">
	<form method=post class='user'>
		<h3>Request</h3>

		<div class="row">
			<select name="camp" class="form-control col-5">
				<?php
					while($row = $stmt1->fetch()){	
						echo '<option ';
						echo 'value = '.$row['cpid'].'  >';
						echo $row['cp_name'].'</option>';
					}
				?>
			</select>


			<div class="form-group col-3">
				<input type="number" class="form-control " name="units" placeholder="units needed" min="0">
			</div>
		</div>

		<button type="submit" name="add-city" class="btn btn-primary">Submit</button>


	</form>
</div>