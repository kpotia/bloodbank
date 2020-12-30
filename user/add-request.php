
<meta charset="latin">
<?php 

    session_start();
    include 'connect.php';
	$stmt1 = $DB->query('SELECT * FROM city');

	// $stmt1 = $DB->query('SELECT * FROM camp');
	


if(isset($_POST['request'])){

	extract($_POST);
	// $stmt2 = $DB->query('SELECT bloodGroup FROM users where uid = '.$_POST['donorID']);

	// $bloodGroup = $stmt2->fetch();
	// $bloodGroup = $bloodGroup['bloodGroup'];
	// var_dump($bloodGroup);
	
	$request = "INSERT INTO `request` ( `city`, `requester`, `bloodGroup`, `nb_of_units`) VALUES ( :city, :requester, :bloodGroup, :unit)";
	
	$stmt = $DB->prepare($request);
	
	// $camp will be set by the session of the campmanager
	//bldGroup get from donorid
	
    if($stmt->execute([
        ':city' =>  $_POST['city'],
         
          ':requester'=> $_SESSION['BB_USER']['uid'],
           ':bloodGroup'=> $_SESSION['BB_USER']['bloodGroup'],
            ':unit' => $_POST['units']
    ])){
		
    ?>
    <script>
    alert('record inserted');
    </script>
    <?php
		
	}		else{echo 'fail due to some reason contact the company';}
	
}
?>


<div class="w-50 m-auto">
	<form method=post class='user'>
		<h3>Request </h3>
		
		<select name="city">
			<?php
			while($row = $stmt1->fetch()){	
				echo '<option ';
				echo 'value = '.$row['cid'].'>';
				echo $row['c_name'].'</option>';
			}
		?>
		</select>



        <div class="form-group">
             <input type="number" class="form-control " name="units" placeholder="number of units donated" min="0">
        </div>
        
		<button type="submit" name="request" class="btn btn-primary">Submit</button>
	
		
	</form>
</div>