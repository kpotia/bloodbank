<!DOCTYPE html>
<html lang="en">
<?php include_once 'inc/head.php';?>

<body>

  <?php include_once 'inc/nav.php';?>

  <main role="main" class="container">
    <!-- summary section -->
    
    <section class="container p-5 mb-5">
      <h1>Camps</h1>

      <!-- <div class="input-group col-md-6">

        <input type="search" class="form-control" role="search"
          aria-roledescription="search request by city, region, bloodgroup" name="search_req" id="search_req">
        <div class="input-group-append">
          <button class="btn btn-primary">Search</button>
        </div>
      </div> -->

  

  <div class="row justify-content-center">
  <?php
   include 'connect.php';
   $stmt = $DB->query('SELECT * FROM camp INNER JOIN region ON rid = region INNER JOIN city ON city = cid LIMIT 3');
 
	while($row = $stmt->fetch()){	

    echo '
  <div class="col-4">
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