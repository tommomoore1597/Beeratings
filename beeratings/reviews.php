<?php 
include_once("../includes/header.php");
//Get review data from table
$reviews = selectALL('reviews');
?>
 

<!--Showcase Area-->
<section class="showcase">
<div class="container d-flex justify-content-center pt-5">
  <div class="row pt-5">
    <h3 class="text-white h1 text-center text-uppercase py-5">Reviews</h3>
    <div class="row">
      <div class="d-flex px-5 justify-content-center">
        <h4 class="text-uppercase me-5">Drink</h4>
        <h4 class="text-uppercase me-5">Rate</h4>
        <h4 class="text-uppercase">Inebriate</h4>
      </div>
      </div>
  </div>
</div>
</section>

<div class="container my-5">
  <div class="row justify-content-center">
    <!-- Display Dynamic Review data -->
  <?php foreach ($reviews as $review): ?>
    <div class="card review-card  col-sm-1 col-md-6 col-lg-3 me-5">
      <img src="img/<?php echo $review['image']; ?>" class="card-img-top mb-2" alt="<?php echo $review['name']; ?>">
      <div class="card-body">
      <a href="" class="text-decoration-none link-text"> <h5 class="card-title text-center "><?php echo $review['name']; ?></h5></a>
      <div class="text-center my-4">
        <img src="img/beericon.svg" height="50" alt="">
        <img src="img/beericon.svg"  height="50" alt="">
        <img src="img/beericon.svg"  height="50" alt="">
        <img src="img/beericon.svg"  height="50" alt="">
        <img src="img/beericon.svg"  height="50" alt="">
      </div>
        <p class="card-text d-none d-md-flex d-lg-flex "><?php echo $review['body']; ?></p>
    </div>
  </div>
  <?php endforeach; ?>
 </div>
</div>


<?php 
include_once '../includes/footer.php';
?>