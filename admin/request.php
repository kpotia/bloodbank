<?php
// include_once '../head.php';
try {
    include 'connect.php';
	$stmt = $DB->query('SELECT * FROM request INNER JOIN city on city = cid inner join users on requester=uid');?>

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
          <h1>Requests</h1>
<a href="add-request.php" class=" btn btn-primary mb-3">Post Request</a>
	
        <div class="row">
        <?php
	while($row = $stmt->fetch()){	
              echo  '<div class="col-md-6">
                    <div class="card request">
                        <div class="request-bg">                            
                            <span class="blood-group">'.$row['bloodGroup'].'</span>
                        </div>
                        <div class="request-info">
                            <p>Request ID:'.$row['rqid'].'</p>
                            <p>City: '.$row['c_name'].'</p>
                            <p>No of unit: '.$row['nb_of_units'].'</p>                            
                        </div>
                    </div></div>';
    }?>
                    
                </div>
	
     
     <?php } catch(PDOException $e) {   echo $e->getMessage();   }          
        include_once 'inc/footer.php';
	?>