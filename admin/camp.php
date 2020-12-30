<?php
include_once 'inc/head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT * FROM camp INNER JOIN region ON rid = region INNER JOIN city ON city = cid');?>

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
		  <h1>Camps</h1>
		  
		  <a href="add-camp.php" class="btn btn-primary m-2"> Add Camp</a>

	
<div class="camp-container">
           
      
	
	<?php
	while($row = $stmt->fetch()){	

		echo '<div class="camp">
		<h2 class="camp-name bg-primary">
			<i class="fa fa-campground"></i>
			'.$row['cp_name'].'
		</h2>
		<div class="camp-info">
			<div class="camp-address">
				<i class="fa fa-location-arrow"></i>
				<div>
					<h4>'.$row['c_name'].'</h4><i class="mx-1">•</i>
					
					<h5>'.$row['r_name'].'</h5>
				</div>
			</div>
			<div class="camp-contact">
				<i class="fas fa-blender-phone"></i>
				<p> '.$row['phone'].'</p>
			</div>
		</div>
	</div>
		
		';
		// echo '<tr>';
		// echo '<td>'.$row['cpid'].'</td>';
		// echo '<td>'.$row['cp_name'].'</td>';	
		// echo '<td>'.$row['street'].'</td>';	
		// echo '<td>'.$row['phone'].'</td>';	
		// echo '<td>'.$row['r_name'].'</td>';	
		// echo '<td>'.$row['c_name'].'</td>';	
		// echo '</tr>';
	}
		echo "</div>";
		echo "</div>";


} catch(PDOException $e) {
		    echo $e->getMessage();
		}
		

		include_once 'inc/footer.php';
   	?>