<?php 
include_once("../includes/header.php");
include_once("../includes/users.php");
?>

<!--Showcase Area-->
<section class="showcase">
<div class="container d-flex justify-content-center pt-5">
  <div class="row  pt-5">
    <h3 class="text-white h1 text-center text-uppercase  py-5">Login</h3>
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

<!-- Login Form-->
<section>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
            <form action="login.php" method="POST">

                <?php 
                //error display includes 
                include_once('../includes/formErrors.php');
                ?>

                <div class="form-group">
                 <label  class="form-label">Username</label>
                <input type="text" class="form-control mb-3 " value="<?php echo $username; ?>" name="username">
                </div>

                           
                <div class="form-group">
                 <label  class="form-label">Password</label>
                <input type="password" class="form-control mb-3" name="password" value="<?php echo $password; ?>">   
                </div> 


                <button type="submit" name="login-btn" class="btn btn-primary mt-3">Login</button>

                <div class="d-flex mt-5 justify-content-center">
                    <h5 class="me-5">Do you have an account? </h5>
                    <a class="btn btn-primary align-self-center" href="register.php">Register</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>

<?php 
include_once("../includes/footer.php");
?>