<!DOCTYPE html>
<html lang="en">

<?php include_once 'inc/head.php';?>

<body >
<?php include_once 'inc/nav.php';?> 

<?php

$conn = new mysqli('localhost', 'root','','bloodbank1');
$fetchQ = 'SELECT * FROM users where uid = '.$_SESSION['BB_USER']['uid'];

$u_info = $conn->query($fetchQ);
$u_info = $u_info->fetch_assoc();

if (isset($_POST['update'])) {

  var_dump($_POST);
  extract($_POST);
 
  $conn = new mysqli('localhost', 'root','','bloodbank1');
  $updQ = 'UPDATE users SET firstname ="'.$firstname.'" ,lastname = "'.$lastname.'",
  email= "'.$email.'" ,phone= "'.$phone.'"  where uid = '.$_SESSION['BB_USER']['uid'];

    if($conn->query($updQ)){
        ?>
            <script>
                alert('record updated');
                window.location = 'myaccount.php';
            </script>
        <?php
    }
  }
?>

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h1 text-gray-800 mb-4">Update Profile</h1>
                    
                  </div>
                  <form class="user" method="post">
                  <div class="form-group">
                      <input type="text" class="form-control form-control-user"
                      value="<?php echo $u_info['firstname']; ?>" required="required" name="firstname"  placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?php echo $u_info['lastname']; ?>" required="required" name="lastname"  placeholder="Enter Last Name...">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?php echo $u_info['email']; ?>" required="required" name="email" aria-describedby="emailHelp" placeholder="Enter Email...">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?php echo $u_info['phone']; ?>" required="required" name="phone"  placeholder="Enter Phone...">
                    </div>
                  
                    
                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                      Update Profile
                    </button>
                   
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <code  class="bg-secondary">

</code>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

