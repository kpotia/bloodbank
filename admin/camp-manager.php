<?php
// include_once '../head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT * FROM campmanager INNER JOIN camp ON cpid = camp');?>

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
		  <h1>Camp managers</h1>
		  
		  <a href="add-camp-manager.php" class="btn btn-primary m-2"> Add Camp manager</a>
	<table class='table'>
		<tr>
			<td> ID </td>
			<td> username </td>
			<td> password </td>
			<td> camp name </td>
			
		</tr>
	
	<?php
	while($row = $stmt->fetch()){	
		echo '<tr>';
		echo '<td>'.$row['cmid'].'</td>';
		echo '<td>'.$row['username'].'</td>';
		echo '<td>'.$row['password'].'</td>';
		echo '<td>'.$row['cp_name'].'</td>';	
		
		echo '</tr>';
	}
		echo "</table>";


} catch(PDOException $e) {
		    echo $e->getMessage();
		}include_once 'inc/footer.php';
   	?>