
<?php include_once 'inc/head.php';?>


<body>
  <!-- navigation bar -->
  <?php include_once 'inc/nav.php';?>

    <main role="main" class="container-fluid m-0 p-0 pt-3">

    <!-- introduction section -->
<section class="row justify-content-center">

    <div class="col-8 display-3 text-center p-5">
      <h1>Welcome to the Blood Bank Porail</h1>
      <p class="lead mb-0">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit quisquam laborum sequi, veniam quis non animi porro
      </p>
      <a href="register.php" class="btn btn-primary btn-lg mt-0">Become a Member</a>
    </div>
</section>
<div class="row justify-content-center pt-3">
<hr class='btn btn-primary' style= 'height: 2px; padding:0px; margin: 0 auto; width: 95%;'>

</div>

<!-- our Camps -->

<section class="container text-center p-5 mb-5">
  <h1>Camps</h1>
  <div class="row F justify-content-center">
  <?php
   include 'connect.php';
   $stmt = $DB->query('SELECT * FROM camp INNER JOIN region ON rid = region INNER JOIN city ON city = cid LIMIT 3');
 
	while($row = $stmt->fetch()){	

    echo '
  <div class="col-md-4">
    <div class="camp">
		<h2 class="camp-name bg-primary">
			<i class="fa fa-campground"></i>
			'.$row['cp_name'].'
		</h2>
		<div class="camp-info">
			<div class="camp-address">
				<i class="fa fa-location-arrow"></i>
				<div>
					<h4>'.strtoupper($row['c_name']).'</h4><i class="mx-1">•</i>
					
					<h5>'.$row['r_name'].'</h5>
				</div>
			</div>
			<div class="camp-contact">
				<i class="fas fa-blender-phone"></i>
				<p> '.$row['phone'].'</p>
			</div>
      </div></div>
	</div>';}?>

  </div>

</section>

<div class="row justify-content-center py-3">
<hr class='btn btn-primary' style= 'height: 2px; padding:0px; margin: 0 auto; width: 95%;'>

</div>

<!-- Request -->
<section class="container p-5 mb-5">
  <h1>Recent Request</h1>
  
  <div class="row justify-content-center">
  <?php
  //  include 'connect.php';
	$stmt = $DB->query('SELECT * FROM request INNER JOIN city on city = cid inner join region on region=rid');
 
	while($row = $stmt->fetch()){	
              echo  '<div class="col-md-4">
                    <div class="card request">
                        <div class="request-bg">
                           
                            <span class="blood-group">'.$row['bloodGroup'].'</span>
                        </div>
                        <div class="request-info">
                            <p>Request ID:'.$row['rqid'].'</p>
                            <p>Date:'.$row['datetime'].'</p>
                            <p>'.$row['c_name'].'<i class="mx-2">&bullet;</i>'.$row['r_name'].'</p>
                            <p>No of unit: '.$row['nb_of_units'].'</p>

                            <p class="btn-group">
                     </p>
                        </div>
                    </div></div>';
    }?>

  </div>
  <a href="request.php" class="btn btn-primary btn-lg text-uppercase">View request</a>


</section>
   

    </main><!-- /.container -->
<?php include_once 'inc/footer.php';?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>

    
</body>
</html>