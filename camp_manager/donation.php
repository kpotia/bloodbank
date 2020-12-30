<?php include 'inc/head.php';

session_start();?>

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
	<?php
// include_once '../head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT * FROM donation 
	inner join users on donor = uid
	inner join camp on camp = cpid 
	inner join city on camp.city = cid where camp ='.$_SESSION['BB_MGR']['camp']);
?>

		  <a href="add-donation.php" class="btn btn-primary m-2"> Add donation</a>
		
		<div class="row">
             
	<?php
	while($row = $stmt->fetch()){	
		echo '   <div class="col-md-6">
		<div class="card donation">
			<div class="blood-group">
				<span>'.$row['bloodGroup'].'</span>
			</div>
			<div class="donation-info text-uppercase">
				<p >Donor: '.$row['firstname'].' '.$row['lastname'].'</p>
				<p><strong>'.$row['cp_name'].' </strong> &bullet; '.$row['c_name'].'</p>
				<p>No of unit: '.$row['units'].'</p>
				<p>'.$row['dateofdon'].'</p>
			</div>
		</div>
	</div>
';
	
	}
		echo "</table>";
	

} catch(PDOException $e) {
		    echo $e->getMessage();
		}

		include_once 'inc/footer.php';
	?>