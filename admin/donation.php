<?php
// include_once '../head.php';
    include 'connect.php';
	
	?>


<?php
include_once 'inc/head.php';
?>


<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<?php include 'inc/sidebar.php';?>
		<!-- End of Sidebar -->
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column container p-3">
			<!-- Main Content -->
			<div id="content">
				<h1>Donations</h1>

				<a href="add-donation.php" class="btn btn-primary m-2">Add Donation</a>

				<div class="row">

					<div class="col-md-6">
						<table class='table'>
							<tr>
								<td>BloodGroup</td>
								<td>Count</td>
							</tr>

							<?php

							try {
								$stmt = $DB->query('SELECT count(*) as countbg,bloodGroup FROM bloodunit  group by bloodGroup');
								while($row = $stmt->fetch()){	echo '<tr>';
									echo '<td>'.$row['bloodGroup'].'</td>';
									echo '<td>'.$row['countbg'].'</td>';
									echo '</tr>';}
								echo "</table>";
						} catch(PDOException $e) {
							echo $e->getMessage();
						}
					
						?>
					</div>
				</div>

				<div class="row">

<?php
				try{
				$stmt = $DB->query('SELECT * FROM donation inner join users on donor = uid
				inner join camp on camp = cpid inner join city on camp.city = cid');
					while($row = $stmt->fetch()){
						echo '<div class="col-md-5">
						<div class="card donation">
							<div class="blood-group">
								<span>'.$row['bloodGroup'].'</span>
							</div>
							<div class="donation-info text-uppercase">
								<p >Donor: '.$row['firstname'].' '.$row['lastname'].'</p> 
								<p><strong>'.$row['cp_name'].'
								</strong> &bullet; '.$row['c_name'].'</p> 
								<p>No of unit: '.$row['units'].'</p>
								<p>'.$row['dateofdon'].'</p> </div>
								</div>
							</div>';}	
					echo "</div> 
					</div>";
	

				} catch(PDOException $e) { 
					echo $e->getMessage();
					}
						include_once 'inc/footer.php';
	?>
</div>
