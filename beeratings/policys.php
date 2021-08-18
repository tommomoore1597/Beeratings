<?php 
include_once("../includes/header.php");
?>
  
  
  <!--Showcase Area-->
<section class="showcase">
<div class="container d-flex justify-content-center pt-5">
  <div class="row text-center pt-5">
    <h3 class="text-white h1 text-uppercase py-5">Our Policys</h3>
 
      <div class="d-flex px-5   justify-content-center">
        <h4 class="text-uppercase me-5">Drink</h4>
        <h4 class="text-uppercase me-5">Rate</h4>
        <h4 class="text-uppercase">Inebriate</h4>
      </div>
  </div>
</div>
</section>
  
<section>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
          <div class="col-lg-4">
          <div class="box-shadow p-3 mb-5  rounded">
         <h2>Our Delivery Policy</h2> 
        <h4 class="my-4">1. General Information</h4>

        All orders are subject to product availability. If an item is not in stock at the time you place your order, we will notify you and refund you the total amount of your order, using the original method of payment. 

      <h4 class="my-4">2. Delivery Location</h4>

      Items offered on our website are only available for delivery to addresses in the United Kingdom. Any shipments outside of UK are not available at this time.

 

      <h4 class="my-4"> 3. Delivery Time</h4>

      An estimated delivery time will be provided to you once your order is placed. Delivery times are estimates and commence from the date of dispatch, rather than the date of order. Delivery times are to be used as a guide only and are subject to the acceptance and approval of your order.

      Unless there are exceptional circumstances, we make every effort to fulfill your order within 2 business days of the date of your order. Business days mean Monday to Friday, except holidays.
      Date of delivery may vary due to carrier shipping practices, delivery location, method of delivery, and the items ordered.

 

    <h4 class="my-4">4. Delivery Instructions</h4>
     You can provide special delivery instructions on the check-out page of our website.

 

      <h4 class="my-4">5. Delivery Costs</h4>

      Delivery costs are based on the weight of your order and the delivery method. To find out how much your order will cost, simple add the items you would like to purchase to your cart, and proceed to the checkout page. Once at the checkout screen, Delivery charges will be displayed.

      Additional Delivery charges may apply to remote areas or for large or heavy items. You will be advised of any charges on the checkout page.

      Sales tax is charged according to the province or territory to which the item is shipped.

      <h4 class="my-4">6. Damaged Items in Transport </h4>

      If there is any damage to the packaging on delivery, contact us immediately <a href="contact.php">here</a>.

 

      <h4 class="my-4">7. Questions</h4>

      If you have any questions about the delivery and shipment or your order, please contact <a href="contact.php">here</a>.



    <h2 class="mt-5"> Our Return Policy</h2>
    <h4 class="my-4"> 1. Returns </h4>

      Option 1 – No Refunds/Exchanges:

      We do not accept returns or exchanges unless the item you purchased is defective. If you receive a defective item, please contact <a href="contact.php">here</a> with details of the product and the defect.

      Upon receipt of the returned product, we will fully examine it and notify you via e-mail, within a reasonable period of time, whether you are entitled to a refund or a replacement as a result of the defect. If you are entitled to a replacement or refund, we will replace the product or refund the purchase price, using the original method of payment.



       Option 2 – Refunds Permitted:

      We accept returns. You can return unopened items in the original packaging within 30 days of your purchase with receipt or proof of purchase. If 30 days or more have passed since your purchase, we cannot offer you a refund or an exchange.

      Upon receipt of the returned item, we will fully examine it and notify you via email, within a reasonable period of time, whether you are entitled to a return. If you are entitled to a return, we will refund your purchase price and a credit will automatically be applied to your original method of payment.

      Only regular priced items may be refunded. Sale items are non-refundable.


 

      <h4 class="my-4">2. Exchanges </h4>

      We only exchange goods if they are defective or damaged. In circumstances where you consider that a product is defective, you should promptly contact us <a href="contact.php">here</a> with details of the product and the defect. You can send the item you consider defective to:

 

      [Address]

 

      Upon receipt of the returned product, we will fully examine it and notify you via e-mail, within a reasonable period of time, whether you are entitled to a replacement as a result of the defect. If you are eligible, we will send you a replacement product.

 

      <h4 class="my-4">3. Exceptions </h4>

      Some items are non-refundable and non-exchangeable.

 

      <h4 class="my-4">4. Shipping</h4>

 

      Refunds do not include any shipping and handling charges shown on the packaging slip or invoice. Shipping charges for all returns must be prepaid and insured by you. You are responsible for any loss or damage to hardware during shipment. We do not guarantee that we will receive your returned item. Shipping and handling charges are not refundable. Any amounts refunded will not include the cost of shipping.


   
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
//Dynamic update cart icon in Navbar
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