  <!DOCTYPE html>
  <html lang="en">
  <?php include 'inc/head.php'; ?>

  <body>
    <?php include_once 'inc/nav.php';?>
    <?php 
  //add Sales
  include('connect.php');


      // include 'connect.php';
    $stmt1 = $DB->query('SELECT * FROM city');


  if(isset($_POST['register'])){
    extract($_POST);
    // session_start();
    
    $add_city = 'INSERT INTO users(firstname,lastname,bloodGroup,city,email,password,phone)
  VALUES
  (:firstname,:lastname,:bloodGroup,:city,:email,:password,:phone) ';
    
    $stmt = $DB->prepare($add_city);
    
    if($stmt->execute([':firstname'=>$firstname,':lastname'=>$lastname,':bloodGroup'=>$bloodGroup,':city'=>$city,':email'=>$email,':password'=>$password,':phone'=>$phone])){
      ?>
      <script>
        alert('User registered successfully');
        window.location = 'login.php';
      </script>
      <!-- echo 'success';
      header('location: users.php'); -->
      <?php
    }		else{echo 'fail due to some reason contact the company';}
    
  }
  ?>

    <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row justify-content-center">

            <div class="col-lg-10">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form action="" method="post">

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstname"
                      placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="lastname"
                      placeholder="Last Name">
                  </div>

                </div>

                <div class="form-group row">

                  <!-- <div class=""> -->
                  <select class="form-control  col-sm-2" name="bloodGroup">
                    <option selected>Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                  </select>
                  <!-- </div> -->

                  <div class=" col-sm-5">
                    <input type="tel" class="form-control form-control-user" placeholder="Phone Number" name="phone">
                  </div>

                  <select name="city"  class="form-control  col-sm-2" > 
                    <?php
                        while($row = $stmt1->fetch()){	
                      echo '<option ';
                      echo 'value = '.$row['cid'].'';
                      echo '>'.$row['c_name'].'</option>';	
                  }
                      ?>
                  </select>
                </div>
          
                <div class="form-group row">
                  <div class=" col-sm-7">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                      placeholder="Email Address">
                  </div>
                  
     
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                      name="password" placeholder="Password">
                  </div>
                  <!-- <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="" placeholder="Repeat Password">
                    </div> -->
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-user btn-block col-4">
                  Register Account
                </button>
                </form>
               
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
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