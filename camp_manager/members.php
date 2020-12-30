<?php
include_once 'inc/head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT * FROM users  INNER JOIN city on city = cid');?>


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
          <h1>Members</h1>

		  <a href="add-user.php" class="btn btn-primary m-2"> Register Member</a>

	
        <div class="donor-container">
	
	<?php
	while($row = $stmt->fetch()){	
        echo '<div class="donor">
        <div class="donor-group bg-primary">
        '.$row['bloodGroup'].'
    </div>
    <div>
        <h4 class="donor-name text-uppercase">'.$row['firstname'].' '.$row['lastname'].'</h4>
        <div class="donor-address">
            <h5 class="donor-phone"><i class="fas fa-blender-phone"></i>'.$row['phone'].'</h5> <i class="mx-1"></i>
            <h5 class="donor-phone"><i class="fa fa-mail-bulk"></i>'.$row['email'].'</h5> <i class="mx-1"></i>
            
        </div>
        </div></div>';
	}
		echo "</div>";
	

} catch(PDOException $e) {
		    echo $e->getMessage();
		}
    ?>
        

    <?php include_once 'inc/footer.php';?>
