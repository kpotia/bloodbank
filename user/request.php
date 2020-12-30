<!DOCTYPE html>
<html lang="en">
<?php include_once 'inc/head.php';?>

<body>

  <?php include_once 'inc/nav.php';?>

  <main role="main" class="container">
  
    <section class="container">
      <h1>Request</h1>

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
	$stmt = $DB->query('SELECT * FROM request INNER JOIN city on city = cid inner join region on region=rid');
 
	while($row = $stmt->fetch()){	
              echo  '<div class="col-md-4">
                    <div class="card request">
                        <div class="request-bg">
                           
                            <span class="blood-group">'.$row['bloodGroup'].'</span>
                        </div>
                        <div class="request-info">
                            <p>Request ID:'.$row['rqid'].'</p>
                            <p>'.$row['c_name'].'<i class="mx-2">&bullet;</i>'.$row['r_name'].'</p>
                            <p>No of unit: '.$row['nb_of_units'].'</p>

                            <p class="btn-group">
                     </p>
                        </div>
                    </div></div>';
    }?>

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