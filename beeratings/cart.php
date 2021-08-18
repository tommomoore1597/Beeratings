
<?php include_once("../includes/header.php"); ?>


<!--Shopping Cart Page-->
<div class="container mt-5">

<!--breadcrumb Navigation for Shopping -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Shopping Basket</li>
  </ol>
</nav>

<div class="row justify-content-center">
  <div class="col-lg-10 ">
    <div class="alert alert-danger " style="display:<?php if(isset($_SESSION['showAlert'])) {echo $_SESSION['showAlert'];}else{echo 'none';}  unset($_SESSION['showAlert']);?>">
      <?php if (isset($_SESSION['cart_message'])) {
                echo $_SESSION['cart_message'];
                } unset($_SESSION['showAlert']);?>
    </div>
<!--Cart table -->
    <div class="table-responsive mt-5">
      <table class="table    text-center">
        <thead>
          <th><h3>Product</h3></th>
          <th><h3>Name</h3></th>
          <th><h3>Price</h3></th>
          <th><h3>Quantity</h3></th>
          <th><h3>Total Price</h3></th>
          <th><a href="action.php?clear=all" class="btn btn-danger p-1" onclick="return confirm('are you want to empty the basket?')">Empty Basket</a></th>
          </tr>
        </thead>
                  
        <tbody>
                  
           <?php  
           //getting products from cart
            $stmt = $conn->prepare("SELECT * FROM cart");
            $stmt->execute();
            $result = $stmt->get_result();
            $subtotal = 0;
            $grand_total = 0;
            while($row = $result->fetch_assoc()):
           ?>
            <!-- Displaying cart information from table -->        
          <tr class="justify-content-center">
            <input type="hidden" class="pid" value="<?php echo $row['id']?>">
            <td><img src="../beeratings/img/<?php echo $row['product_image']?>" alt="<?php echo $row['product_name']?>" width="200"></td>
            <td><h5><?php echo $row['product_name']?></h5></td>
            <td>£<?php echo $row['product_price']?></td>
            <input type="hidden" class="pprice" value="<?php echo $row['product_price']?>">
            <td><input class="form-control itemQty" type="number" value="<?php echo $row['qty']?>" style="width:75px"></td>
            <td>£<?php echo number_format($row['total_price'],2)?></td>
            <td><a href="action.php?remove=<?php echo $row['id']?>" class="text-danger">Remove</a></td>
          </tr>
            <?php $grand_total += $row['total_price'];  ?>
            <?php $subtotal = $grand_total  ?>
            <?php endwhile; ?>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><h3>Subtotal</h3></td>
              <td><h3>£<?php echo number_format($grand_total,2);?></h3></td>
          </tr>
                    
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><h3>Delivery Charge</h3></td>
              <td><h3>Free</h3></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><h3>Total to Pay</h3></td>
            <td><h3>£<?php echo number_format($subtotal,2);?></h3></td>
          </tr>
        </tbody>
      </table>
                
                <div class="mt-2 d-flex justify-content-end">
                    <a href="products.php" class="btn btn-primary me-3">Continue Shopping</a>
                    <?php if (isset($_SESSION['id'])): ?>
                    <a href="checkout.php" class="btn btn-primary <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Go to Payment</a>
                    <?php else: ?>
                      <a href="login.php" class="btn btn-primary">Login to Purchase Products</a>
                      <?php endif; ?>
                </div>
                
         </div>
         </div>
    </div>
</div>

<div class="mb-5"></div>



   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <script>
      //Ajax Changing quantities and prices in cart
      $(document).ready(function(){
        
        $(".itemQty").on('change', function(){
            var $el = $(this).closest('tr');

            var pid = $el.find(".pid").val();
            var pprice = $el.find(".pprice").val();
            var qty = $el.find(".itemQty").val();
            location.reload(true);
            
            $.ajax({
                url: 'action.php',
                method: 'post',
                cache: false,
                data: {qty:qty,pid:pid,pprice:pprice},
                success: function(response){
                    
                    console.log(response);
                }
            });
        });

        load_cart_item_number();
        // Update cart number in nav bar
        function load_cart_item_number(){
          $.ajax({
            url: 'action.php',
            method: 'get',
            data: {cartItem:"cart_item"},
            success:function(response){
              $("#cart-item").html(response);
            }
          });
        }

      });
    </script>

<?php include_once("../includes/footer.php"); ?>