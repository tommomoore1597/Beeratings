<?php 
  include_once("../includes/header.php");
  //statments for getting table data for Dynamic blog and review post
  $latestblog = $conn->query('SELECT * FROM blog ORDER BY created_at DESC LIMIT 1');
  $latestreview = $conn->query('SELECT * FROM reviews ORDER BY id DESC LIMIT 1');
?>

<!--Showcase Area-->
<section class="showcase welcomebanner">
  <div class="container d-flex justify-content-center pt-5">
    <div class="row text-center pt-5">
      <h3 class="text-white h1 text-uppercase py-5">Welcome To Beeratings</h3>
      <h1 class="text-white h3 text-uppercase pb-5">Home of Independent Beer Reviews</h1>
      <div class="d-flex px-5   justify-content-center">
        <h4 class="text-uppercase me-5">Drink</h4>
        <h4 class="text-uppercase me-5">Rate</h4>
        <h4 class="text-uppercase">Inebriate</h4>
      </div>
    </div>
  </div>
</section>

<!-- Shop Banner-->
<section class="container d-flex justify-content-center"></section>
    <div class="pt-5 d-flex justify-content-center headerbanner">
   
    <h4 class=" text-uppercase align-self-center text-black">Check out our new shop</h4>
    <a href="products.php" class="btn btn-primary pt-3   align-self-center text-uppercase">Shop</a>
  </div>



  <!--Blog/Review Section-->
<div class="container my-5">
 <div class="row justify-content-between">
      <?php //loop to display dynamic blog info
        while($row = $latestblog->fetch_assoc()): ?>
    <div class="card col-lg-5  me-5">
      <h3 class="mb-5"> Latest Blog Post</h3>
      <img src="img/<?php echo $row['image'];?>" class="card-img-top" alt="<?php echo $row['title'];?>">
      <div class="card-body">
        <a href="" class="text-decoration-none link-text"><h5 class="card-title "><?php echo $row['title'];?></h5></a>
        <p class="card-text"><?php echo $row['body'];?></p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Posted on <?php echo date("d/m/Y", strtotime($row['created_at']));?></small>
     </div>
    </div>
      <?php endwhile; ?>

  <!-- While loop to get display review info-->
      <?php while($row = $latestreview->fetch_assoc()): ?>
    <div class="card col-lg-5">
      <h3 class="mb-5">Featured Review</h3>
      <img src="img/<?php echo $row['image'];?>" class="card-img-top w-50 align-self-center" alt="<?php echo $row['name'] ;?>">
      <div class="card-body">
        <a href="" class="text-decoration-none link-text"> <h5 class="card-title text-center "><?php echo $row['name'] ;?></h5></a>
        <div class="text-center my-4">
          <img src="img/beericon.svg" height="60" alt="">
          <img src="img/beericon.svg"  height="60" alt="">
          <img src="img/beericon.svg"  height="60" alt="">
          <img src="img/beericon.svg"  height="60" alt="">
          <img src="img/beericon.svg"  height="60" alt="">
        </div>
      <p class="card-text"><?php echo $row['body'];?></p>
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

<!-- Script for displaying dynamic cart number in header -->
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