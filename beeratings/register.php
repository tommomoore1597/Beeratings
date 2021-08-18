<?php 
include_once("../includes/header.php");
?>
<?php 
include_once("../includes/users.php");
?>



<!--Showcase Area-->
<section class="showcase">
<div class="container d-flex justify-content-center pt-5">
  <div class="row  pt-5">
    <h3 class="text-white h1 text-center text-uppercase  py-5">Register</h3>
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

<!-- Register Form-->
<section>
    <div class="container my-5">
        <div class="row justify-content-center">
          <div class="col-lg-4">
          <div class="box-shadow p-3 mb-5  rounded">
            <form action="register.php" onsubmit="return validate_user()" method="POST">

                <?php 
                include_once('../includes/formErrors.php');
                ?>

                <div class="form-group">
                 <label  class="form-label">Username</label>
                <input type="text" class="form-control mb-3 " value="<?php echo $username; ?>" name="username">
                </div>

                <div class="form-group">
                 <label  class="form-label">Email</label>
                <input type="email" class="form-control mb-3" value="<?php echo $email; ?>" name="email">   
                </div>
                           
                <div class="form-group">
                 <label  class="form-label">Password</label>
                <input type="password" class="form-control mb-3" name="password" value="<?php echo $password; ?>" id="password"  onkeyup='check();'>   
                </div> 

                <div class="form-group">
                <label  class="form-label">Password Confirmation</label>
                <input type="password" class="form-control mb-3" name="passwordConf" value="<?php echo $passwordConf; ?>" id="confirm_password"  onkeyup='check();' >
                <span id='message' class="mb-3"></span>
                </div>

                <button type="submit" name="register-btn" class="btn btn-primary mt-3">Register</button>

                <div class="d-flex mt-5 justify-content-center">
                    <h5 class="me-5">Already have an account: </h5>
                    <a class="btn btn-primary align-self-center" href="login.php">Login</a>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>



<!--Password Match-->
<script>
        var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords do not match';
  }
}
        </script>

<?php 
include_once("../includes/footer.php");
?>