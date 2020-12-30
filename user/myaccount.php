<!DOCTYPE html>
<html lang="en">
<?php include_once 'inc/head.php';?>

<body>

    <?php include_once 'inc/nav.php';?>

    <main role="main" class="container">

        <section class="container">
            <h1>My Account</h1>
            <div class="row">
                <div class="col-md-6">
                    <h2>Donor Profile</h2>
                    <hr>
                  
                    <?php
                        include_once 'connect.php';

                        $row = $DB->query('SELECT * FROM users where uid = '.$_SESSION['BB_USER']['uid']);

                        $row = $row->fetch(PDO::FETCH_ASSOC);
                    echo '
                        <div class="donor" style="width: 90%;padding: 25px 10px;">
                            <div class="donor-group bg-primary">
                                '.$row['bloodGroup'].'
                            </div>
                            <div>
                                <h4 class="donor-name text-uppercase">'.$row['firstname'].' '.$row['lastname'].'</h4>
                                <div class="donor-address">
                                    <h5 class="donor-phone"><i class="fas fa-blender-phone"></i>'.$row['phone'].'</h5>
                                    <i class="mx-1"></i><br>
                                    <h5 class="donor-phone"><i class="fa fa-mail-bulk"></i>'.$row['email'].'</h5> <i
                                        class="mx-1"></i>

                                </div>
                            </div>
                        </div>';

                        ?>

                   

                </div>

                <div class="col-md-6">
                    <h2>Donation History</h2>
                    <hr>
                    <?php
                        $db2 =  new mysqli('localhost','root','','bloodbank1');
                        $row = $db2->query('SELECT * FROM donation INNER JOIN camp on camp = cpid where donor = '.$_SESSION['BB_USER']['uid']);
                 
                        
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Camp</th>
                                <th>No of Units</th>
                            </tr>
                        </thead>
<tbody>
<?php
                        if($row->num_rows > 0){
                            $row = $row->fetch_all(MYSQLI_ASSOC);
                           foreach($row as $e):
                            // var_dump($e);
                            echo '
                               <tr>
                               <td>'.$e['did'].'</td>
                               <td>'.$e['dateofdon'].'</td>
                               <td>'.$e['cp_name'].'</td>
                               <td>'.$e['units'].'</td>
                               </tr>
                               ';
                           endforeach;
                        }else {
                            echo '<tr><td><h3>no donation recorded yet</td></tr></h3>';
                        }
                        ?>
</tbody>
                        
                    </table>

                </div>
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