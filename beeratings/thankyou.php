<?php include_once("../includes/header.php");
 include_once("../includes/middleware.php"); 
session_start();
?>

<!-- Thank you page -->
<div class="jumbotron text-center mt-5">
  <h1 class="display-3">Thank You </h1>
  <hr>
</div>
<div class="container mt-5 mb-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10">
              <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
              <?php if (isset($_SESSION['id'])): ?>
              <!-- display username from session -->
                <h6 class="name">Hello <?php echo $_SESSION['username']; ?>,</h6><span class="fs-12 text-black-50">Your order has been confirmed and will be shipped in two days</span>
                <?php endif; ?>
                <hr>
               
               
                    </div>
                </div>
                <span class="d-block">Expected delivery date</span><span id="deldate" class="font-weight-bold text-success"></span><span class="d-block mt-3 text-black-50 fs-15">We will be sending a shipping confirmation email when the item is shipped!</span>
                <hr>
                <a class="btn btn-primary btn-sm" href="index.php" role="button">Go to Homepage</a>
                
            </div>
    






<script>
//calulate delivery date
window.onload = function(){
     var someDate = new Date();
    var numberOfDaysToAdd = 2;
    someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
  

    var dd = someDate.getDate();
    var mm = someDate.getMonth() + 1;
    var y = someDate.getFullYear();

    var someFormattedDate = dd + '/'+ mm + '/'+ y;
      document.getElementById('deldate').innerHTML = someFormattedDate;
    };
  </script>




<?php include_once("../includes/footer.php"); ?>