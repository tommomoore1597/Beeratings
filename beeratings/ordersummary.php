<?php
session_start();
include_once("../includes/header.php"); 
 include_once("../includes/middleware.php"); 
    ?>



<div class="container">
  <div class="py-5 text-center"> 
    <h2>Order Summary</h2>
  </div>

<!--Breadcrumb Navigation -->
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="cart.php">Shopping Basket</a></li>
    <li class="breadcrumb-item" ><a href="checkout.php">Payment</a></li>
    <li class="breadcrumb-item active mb-5" aria-current="page">Order Summary</li>
  </ol>
</nav>
   
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your Basket</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">

  
  

      <?php 
      // Displaying Basket information
        $grand_total = 0;
      	$products = '';
      	$items = [];
        $user_id = $_SESSION['id'];
      // selecting products from cart
      $sql = "SELECT CONCAT(product_name, 'x',qty) AS ItemQty, total_price FROM cart";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
      $grand_total += $row['total_price'];
      $items[] = $row['ItemQty'];
      }
      $products = implode(', <br>', $items);

       ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h5><?php echo $products;?></h5>
            
          </div>
         
         
         
          
        </li>
        <!-- Total Amount Section -->
        <li class="list-group-item d-flex justify-content-between">
          <span>Total to Pay (GBP)</span>
          <strong>£<?php echo number_format($grand_total,2);?></strong>
        </li>
      </ul>
    </div>
       
    

      <!-- Delivery address form -->
    <div class="col-md-8 order-md-1" id="order">
      <h4 class="mb-3">Delivery Address</h4>
      <form method="post" id="placeOrder" >
      <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
      <input type="hidden" name="products" value="<?php echo $products;?>">
      <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
      
        <div class="row">
          <div class=" mb-3">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control mt-1" name="fullname" id="fullname" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control mt-1" id="email" placeholder="you@example.com" required>
          <div class="invalid-feedback">
            Please enter a valid email address for Delivery updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Address</label>
            <textarea name="address" class="form-control mt-1" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
        
        <hr class="mb-4">

        <div class="d-block my-5 w-50">
    
        <!-- Place order Button -->
       <button type="submit" name="submit" value="Place Order" class="btn btn-primary" >Place Order</button>
       </div>
       
      </form>
     
    
  </div>
</div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    
    <ul class="list-inline">
   
    </ul>
  </footer>
</div>






  

<?php include_once("../includes/footer.php"); ?>