<?php include_once("../includes/header.php"); ?>


<!--Showcase Area-->
<section class="showcase">
  <div class="container d-flex justify-content-center pt-5">
    <div class="row pt-5">
      <h3 class="text-white h1 text-center text-uppercase py-5">Shop</h3>
      <div class="row">
        <div class="d-flex px-5 mx-1  justify-content-center">
          <h4 class="text-uppercase me-5 ">Drink</h4>
          <h4 class="text-uppercase me-5">Rate</h4>
          <h4 class="text-uppercase">Inebriate</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Product Display Section -->
<div class="container mt-5">
  <div id="message"></div>
   <div class="row">
    <?php //Getting product information and displaying on page
      $stmt = $conn->prepare("SELECT * from products");
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()):
    ?>
      <div class="col-lg-3 col-sm-12 col-md-4  my-4">
        <div class="card-deck">
          <div class="card p-2  mb-2">
            <img src="../beeratings/img/<?php echo $row['product_image']?>" alt="<?php echo $row['product_name']?>" class="card-img-top mb-2">
            <div class="card-body p-1">
              <h4 class="card-title text-center"><?php echo $row['product_name']?></h4>
              <h5 class="card-text text-center">£ <?php echo $row['product_price']?></h5></div>
              <div class="card-footer  text-center p-1">
                <form class="form-submit">
                  <input type="hidden" class="pid" value="<?php echo $row['id']?>">
                  <input type="hidden" class="pname" value="<?php echo $row['product_name']?>">
                  <input type="hidden" class="pprice" value="<?php echo $row['product_price']?>">
                  <input type="hidden" class="pimage" value="<?php echo $row['product_image']?>">
                  <input type="hidden" class="pcode" value="<?php echo $row['product_code']?>">
                  <button class="btn btn-primary mt-2 text-uppercase addItemBtn">Add to cart</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>



   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
    //Ajax taking information from add to cart button
      $(document).ready(function(){
        $(".addItemBtn").click(function(e){
          e.preventDefault();
          var $form = $(this).closest(".form-submit");
          var pid = $form.find(".pid").val();
          var pname = $form.find(".pname").val();
          var pprice = $form.find(".pprice").val();
          var pimage = $form.find(".pimage").val();
          var pcode = $form.find(".pcode").val();

          $.ajax({
            url: 'action.php',
            method: 'post',
            data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
              load_cart_item_number();
            }
          });

        });

        load_cart_item_number();
    //dynamic cart button
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