<?php include_once("../includes/header.php"); 
 include_once("../includes/middleware.php"); 
    ?>



<div class="container">
 
  <!--breadcrumb navigation -->
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="cart.php">Shopping Basket</a></li>
      <li class="breadcrumb-item active mb-5" aria-current="page">Payment</li>
    </ol>
</nav>

<!--basket section -->
<div class="row">
  <div class="col-md-4 order-md-2 mb-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Your Basket</span>
      <span class="badge badge-secondary badge-pill">3</span>
    </h4>
    <ul class="list-group mb-3">
      <?php
        $grand_total = 0;
      	$products = '';
      	$items = [];
      //select product information to display in basket
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
        <li class="list-group-item d-flex justify-content-between">
          <span>Total to Pay (GBP)</span>
          <strong>£<?php echo number_format($grand_total,2);?></strong>
        </li>
      </ul>
    </div>
       
    

<div class="col-md-8 order-md-1" id="order">
  <h4 class="mb-3">Payment Method</h4>
    <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
    <input type="hidden" name="products" value="<?php echo $products;?>">
      <div class="row">
        <div class=" mb-3">
        <div class="d-block my-5 w-50">
          
      
          
          </div>
        </div>

          <!-- Order summary-->
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
              
                
                <div class="p-3 p-lg-5">

                  <!-- paypal form start-->
                  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                  <input type="hidden" name="cmd" value="_cart">
                  <!-- business email below, in this case a developer email from paypal developer sandbox-->
                  <input type="hidden" name="business" value="thomasmoore-facilitator@gmail.com">
                  <input type="hidden" name="rm" value="2">
                    
                      <?php
                      //select cart table information
                      $table = 'cart';

                      $cart = selectALL($table);
                      $grand_total = 2.50;
                      $item_name=0;
                    $item_number=0;
                    $item_quantity=0;
                    $item_amount=0;
                    
                      //Foreach item in the cart, increment the hidden field numbers with the ++
                        foreach ($cart as $product):
                        $item_name++;
                        $item_number++;
                        $item_amount++;
                        $item_quantity++;
                        ?>
                
                      <!-- hidden inputs for paypal-->
                      <input type="hidden" name="item_name_<?php echo $item_name;?>" value="<?php echo $product['product_name'];?>">
                      <input type="hidden" name="item_number_<?php echo $item_number;?>" value="<?php echo $product['id'];?>">
                      <input type="hidden" name="amount_<?php echo $item_amount;?>" value="<?php echo $product['product_price'];?>">
                      <input type="hidden" name="quantity_<?php echo $item_quantity;?>" value="<?php echo $product['qty'];?>">
                      <!-- these values are required as part of the minimum html form for paypal, the transaction will not work without these-->
                      <input type="hidden" name="currency_code" value="GBP">
                      <input type="hidden" name="upload" value="1">
                      <input type="hidden" name="shipping" value="2.50">
                      <!-- / end hidden inputs for paypal-->
                    
                      <?php endforeach; ?>
                  <!-- paypal button, restyle it please-->
                  <input type="hidden" name="return" value="https://www.webdeveloperscotland.co.uk/gradedunit-beeratings/beeratings/ordersummary.php">
                  <input type="hidden" name="notify_url" value="https://www.webdeveloperscotland.co.uk/gradedunit-beeratings/beeratings/ordersummary.php">
                  <input type="hidden" name="custom" >
                  <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">
                  </form> <!-- /end paypal form-->
            </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    
    <ul class="list-inline">
   
    </ul>
  </footer>






  

<?php include_once("../includes/footer.php"); ?>