<?php 
ob_start();
session_start();
include('include/cust_header.php');

if(!isset($_SESSION['email'])){
  header('location: sign-in.php');
}
?>
   <div class="jumbotron jumbotron-custom text-white">
    <div class="container text-center">
        <h2 class="display-4">My Orders</h2>
        <p class="lead">Track your orders</p>
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
     
     <div class="container mt-5 mb-5">
      
      <div class="row">

         <div class="col-md-3">
          <?php include('include/sidebar.php');?>
        </div>

         <div class="col-md-9">
          <!-- <h3>My Orders:</h3><hr> -->
          <?php 
          $customer_id = $_SESSION['id'];

          $order_query = "SELECT * FROM customer_order WHERE customer_id=$customer_id";
          $run = mysqli_query($con,$order_query);

          if(mysqli_num_rows($run) > 0){

                  if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                  }
          ?>      
                   <table class="table table-responsive table-hover ">
                      <thead class="thead-light">
                          <tr>
                              <th>#Invoice</th>
                              <th width="120px">Product image</th>
                              <th>Product name</th>
                              <th>Product quantity</th>
                              <th>Total Price (MRP)</th>
                              <th>Date</th>
                              <th width="120px">Status</th>
                              
                          </tr>
                      </thead>
                     
                      <tbody>
                          <?php
                              
                                    while($order_row = mysqli_fetch_array($run)){
                                      $order_invoice = $order_row['invoice_no'];
                                      $order_pro_id  = $order_row['product_id'];
                                      $order_qty     = $order_row['products_qty'];
                                      $order_amount  = $order_row['product_amount'];
                                      $order_date    = $order_row['order_date'];
                                      $order_status  = $order_row['order_status'];

                                      $pro_query  = "SELECT * FROM furniture_product WHERE product_id=$order_pro_id";
                                      $pro_run    = mysqli_query($con,$pro_query);
                                                      
                                       if(mysqli_num_rows($pro_run) > 0){
                                        while($pr_row = mysqli_fetch_array($pro_run)){
                                             
                                             $title = $pr_row['product_name'];
                                             $img1 = $pr_row['product_img1'];
                                           
                                  
                                    
                            ?> 
                             <tr>
                                <td>#<?php echo $order_invoice;?></td>
                                 <td>
                                     <img src="../img/<?php echo $img1;?>" width="100%">
                                 </td>
                                 <td>
                                    <h6><?php echo $title;?></h6>
                                  
                                 </td>
                                 <td>
                                    x <?php echo $order_qty;?>
                                 </td>
                                 <td><?php echo $order_amount;?> </td>
                                 <td><?php echo $order_date;?></td>
                                 <td><?php 
                                   if($order_status == 'pending'){
                                     echo "<i class='far fa-exclamation-circle text-warning'></i> $order_status";
                                   }
                                  else if($order_status == 'verified'){
                                    echo "<i class='far fa-check-circle text-success'></i> $order_status";
                                  }
                                  else if($order_status == 'delivered'){
                                    echo "<i class='far fa-truck text-primary'></i> $order_status";
                                  }
                                 ?> </td>
                                 
                             </tr>   
                            <?php
                              }
                            } 
                          } 
                              ?>
                          
                      </tbody>
                   </table>
              <?php                     
                            
                        }
            else{
              echo "<h2 class='text-center text-secondary mt-5 mb-5'>You haven't ordred anything yet </h2>";
              }
              ?>
          
         </div>
       </div>

     </div>
      
   

     <?php include('include/footer.php');?>