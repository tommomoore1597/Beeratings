
<footer class="footer mt-5 ">
   <div class="container-fluid">
       <!-- Footer logo Section -->
     <div class="row ">
     <div class="col-lg-3 align-self-center">
     <img src="./img/Beeratingsslogangrey.jpg" alt="Beeratings logo" class="d-none d-lg-flex"  id="footerimage" width="500" >
     
     </div>
      <!-- Footer navigation Menu-->
     <div class="col-lg-6" id="footermenu">
     <ul class="list-unstyled text-center fs-5 my-5 align-self-center">
        <li ><a href="about.php" class="nav-link menu-text">About Us</a></li> 
        <li ><a href="contact.php" class="nav-link menu-text">Contact Us</a></li> 
        <li><a href="policys.php" class="nav-link menu-text">Our Policys</a></li> 
     </ul>
     </div>
     <!-- Footer Social Medias lInks-->
      <div class="col-lg-3 align-self-center" id="socialmenu">
     <div class="text-light text-center me-5" >
      <h3>Follow Us On:</h3>
        <div class="fs-1 text-center">
         <a href="https://www.facebook.com/Beeratings-105798311701240" class=" menu-text"><i class="fab fa-facebook pe-3"></i></a>
         <a href="https://www.instagram.com/beeratings/?hl=en" class=" menu-text"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
      
      </div>
     </div> 
    </div>
    <div class="svginc mt-2  text-light" >Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a><span> Copyright Thomas Moore 2021</span></div>
</footer>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>


 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


 <script src="https://www.paypal.com/sdk/js?client-id=AUSnDGm9qr-nZk6BQpzqpKhK3P61BHh5nHIJAZBB4WAhkF0Zh9hSZMxUijgUDiEyNXrD5TryMAImgFlO&disable-funding=credit,card,sofort&currency=GBP" ></script>

<script>

  var total = <?php echo number_format($grand_total,2);?>  
  //display Paypal button 
  paypal.Buttons({
    style: {
        size: 'medium',
        color: 'gold',
        shape: 'pill',
        label: 'checkout'
       },

    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                
                    value: total
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("https://www.webdeveloperscotland.co.uk/gradedunit-beeratings/beeratings/ordersummary.php")
        })
    },
    onCancel: function (data) {
        window.location.replace("https://www.webdeveloperscotland.co.uk/gradedunit-beeratings/beeratings/checkout.php")
    }
}).render('#paypal-payment-button');



  $(document).ready(function(){

    //taking form data and passing to PHP for Order confirmation 

    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
          window.location = 'thankyou.php';
          
        }
      });
    });

    load_cart_item_number();
//dynamically update shopping cart number
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

</body>

</html>