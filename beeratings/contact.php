<?php 
include_once("../includes/header.php");
?>
  
  
  <!--Showcase Area-->
<section class="showcase">
<div class="container d-flex justify-content-center pt-5">
  <div class="row text-center pt-5">
    <h3 class="text-white h1 text-uppercase py-5">Contact Us</h3>
    <h1 class="text-white h3 text-uppercase pb-5">Let us know how we are doing!</h1>
      <div class="d-flex px-5   justify-content-center">
        <h4 class="text-uppercase me-5">Drink</h4>
        <h4 class="text-uppercase me-5">Rate</h4>
        <h4 class="text-uppercase">Inebriate</h4>
      </div>
  </div>
</div>
</section>
  
<!-- Contact form -->
<section>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="box-shadow p-3 mb-5  rounded">
          <form action="contact.php" method="POST">

            
                <div class="form-group">
                 <label  class="form-label">Name</label>
                <input type="text" class="form-control mb-3 "  name="username">
                </div>

                <div class="form-group">
                 <label  class="form-label">Email</label>
                <input type="email" class="form-control mb-3"  name="email">   
                </div>
                           
                <div class="form-group">
                 <label  class="form-label">Message</label>
                <textarea name="message" cols="30" rows="10" class="form-control"></textarea>  
                </div> 



                <button type="submit" name="register-btn" class="btn btn-primary mt-3">Send</button>

            </form>
          </div>
        </div>
      </div>
  </div>
</section>
  
  
  
  
  
  
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
      $(document).ready(function(){
        
    

        load_cart_item_number();

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
<?php 
include_once("../includes/footer.php");
?>