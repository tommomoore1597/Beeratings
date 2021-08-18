<?php 
include_once("../includes/header.php");
//select all blog post that are published
$posts = selectALL('blog', ['published' => 1]);

?>
 

<!--Showcase Area-->
<section class="showcase">
  <div class="container d-flex justify-content-center pt-5">
    <div class="row  pt-5">
      <h3 class="text-white h1 text-center text-uppercase  py-5">Blog</h3>
      <div class="row ">
        <div class="d-flex justify-content-center px-5">
          <h4 class="text-uppercase mx-5">Drink</h4>
          <h4 class="text-uppercase me-5">Rate</h4>
          <h4 class="text-uppercase">Inebriate</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Blog post -->
<div class="container my-5">
  <div class="row justify-content-center post">
  <!-- looping through all blog posts and displying them -->
  <?php foreach ($posts as $post): ?>
  <div class="card col-lg-3 me-5">
      <img src="img/<?php echo $post['image']; ?>" class="card-img-top" alt="<?php echo $post['image']; ?>">
        <div class="card-body">
          <a href="" class="text-decoration-none link-text"> <h5 class="card-title "><?php echo $post['title']; ?></h5></a>
          <p class="card-text"><?php echo $post['body']; ?></p>
        </div>
        <div class="card-footer mb-5">
          <small class="text-muted">Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></small>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
 </div>


<?php 
include_once '../includes/footer.php';
?>