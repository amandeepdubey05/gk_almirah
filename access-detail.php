<?php 
include('include/cust_header.php');

if(!isset($_SESSION['email'])){
    header('location: sign-in.php');
}

if(isset($_SESSION['email'])){
  $customer_id    = $_SESSION['id'];
}
?>

<div class="jumbotron jumbotron-custom text-white">
    <div class="container text-center">
        <h2 class="display-4">Account Details</h2>
        <p class="lead">View your Account Details</p>
    </div>
</div>
<style>
   .jumbotron-custom {
        position: relative;
        /* background-image: url('path-to-your-background-image.jpg'); Replace with your background image path */
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 100px 25px;
        margin-bottom: 0;
    }

    .jumbotron-custom::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Black overlay with opacity */
        z-index: 1;
    }

    .jumbotron-custom .container {
        position: relative;
        z-index: 2;
    }

    .jumbotron-custom h2 {
        font-size: 3.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .jumbotron-custom p.lead {
        font-size: 1.5rem;
        margin-bottom: 0;
    }

</style>

   <div class="container mt-5">
       <div class="row">

        <div class="col-md-3">
          <?php include('include/sidebar.php');?>
        </div>

        <div class="col-md-9">
          <h3>Access Details:</h3><hr>
          <h6>CHANGE PASSWORD</h6>
           <p>If you wish to change the password to access your account, please provide
            the following information:</p>
          
            
              <?php
              if(isset($_POST['update'])){
                $old_pass     = $_POST['old_pass'];
                $new_pass     = $_POST['new_pass'];
                $confirm_pass = $_POST['conf_pass'];

               $query = "SELECT cust_pass FROM customer Where cust_id=$customer_id";
               $run   = mysqli_query($con,$query);

               if(mysqli_num_rows($run) > 0 ){
                  $row = mysqli_fetch_array($run);
                  $cust_pass  = $row['cust_pass'];
                   if(!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass)){
                      if($old_pass === $cust_pass){
                         if($new_pass===$confirm_pass){

                          $up_query = "UPDATE customer SET cust_pass = '$confirm_pass'";
  
                           if(mysqli_query($con,$up_query)){
                             $msg ="<div class='alert alert-success alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                             <strong><i class='fas fa-check-circle'></i> Congratulation! </strong> your password has been changed.
                             <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                              <span  aria-hidden='true'>&times;</span>
                             </button>
                              </div>";
                           
                                  }
                            } 
                            else {
                           $error="<div class='alert alert-danger alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                           <strong><i class='fas fa-info-circle'></i> Ooh! </strong>New password and confirm password must be matched.
                           <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                            <span  aria-hidden='true'>&times;</span>
                           </button>
                            </div>";
                            }
                      }
                      else{
                        $error="<div class='alert alert-danger alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                           <strong><i class='fas fa-info-circle'></i> Ooh! </strong>Old password is wrong!.
                           <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                            <span  aria-hidden='true'>&times;</span>
                           </button>
                            </div>";
                      }


                      



                       }else{
                          $error="<div class='alert alert-danger alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
                          <strong><i class='fas fa-info-circle'></i> Sorry! </strong>All(*) Fields Are Required.
                          <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
                            <span  aria-hidden='true'>&times;</span>
                          </button>
                            </div>";
                   }
                }
              }

              if(isset($msg)){
                echo $msg;
              }
              else if(isset($error)){
                echo $error;
              }
              ?>
              
            <form  method="post" class="w-50">

                <div class="form-group">
                  <label>Old Password: *</label>
                  <input type="text" name="old_pass" placeholder="Old Password" class="form-control" >
               </div>

                <div class="form-group">
                  <label>New Password: *</label>
                  <input type="text" name="new_pass" placeholder="New Password" class="form-control" >
                </div>

                <div class="form-group">
                  <label>Cofirm Password: *</label>
                  <input type="text" name="conf_pass" placeholder="Confirm Password"  class="form-control" >
              </div>

              <div class="form-group text-center mt-4">
                <input type="submit" name="update" class="btn btn-primary" value="Update">
              </div>
         
          </form> 
             
            
           
         </div>
       </div>
   </div>
   
   <?php include('include/footer.php');?>