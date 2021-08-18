<?php include_once("../../../includes/middleware.php"); 
    adminOnly();?>

 
<header class="adminheader">
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid py-3">
      <a class="navbar-brand" href="../users/admin_users.php"><img src="../../img/Beeratingfulllogogrey.jpg" class="img-fluid w-25" alt="beeratings logo"></a>
        <!-- Nvigation for Admin User -->
          <div class="btn-group ms-auto ">
          <?php if (isset($_SESSION['id'])): ?>
            <button class="btn btn-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Welcome <?php echo $_SESSION['username'];?>
            </button>
            <?php endif; ?>
            <ul class="dropdown-menu dropdown-menu-dark">
            
            <li><a class="dropdown-item" href="../../index.php">Website Homepage</a></li>

            <li><a class="dropdown-item" href="<?php echo '../../../includes/logout.php' ?>">Log Out</a></li>
              </ul>
              </div>
      </div>
   
  </nav>
  </header>




   