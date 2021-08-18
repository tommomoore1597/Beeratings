<?php include_once("db.php"); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <meta name="robots" content="noindex">
        <meta property="og:title" content="Beeratings | Beer Reviews " />
        <meta property="og:description" content="Independent Craft Beer reviewer based in the Uk" />
        <meta property = "og:type" content="beer"/>
        <meta property="og:image" content="./img/Beeratingfulllogogrey.jpg" />
        <meta property="keywords" content="craft beer shop blog reviews " />
        <meta name="description" content="Welcome to Beeratings a scottish based review company giving you honest opinions on great beer.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    
    <title>Beeratings</title>
</head>


<body>
<!-- navigation menu -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid py-3">
      <a class="navbar-brand" href="index.php"><img src="./img/Beeratingfulllogogrey.jpg" alt="beeratings logo"></a>
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"><i class="fas fa-bars"></i> </span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link menu-text" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="products.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="reviews.php">Reviews</a>
          </li>
        
        <li>
          <a class="nav-item nav-link menu-text active me-5 IteminCart " href="../beeratings/cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge"></span></a>
        </li>
           
              <!-- check to see if user logs in -->
            <?php if (isset($_SESSION['id'])): ?>
           <div class="btn-group">
            <button class="btn btn-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Welcome <?php echo $_SESSION['username']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
          
          <!-- check to see if user admin logs in -->
              <?php if($_SESSION['admin']): ?>
            <li><a class="dropdown-item" href="../beeratings/admin/users/admin_users.php">Admin Panel</a></li>
              <?php endif; ?>
            <li><a class="dropdown-item" href="<?php echo '../includes/logout.php' ?>">Log Out</a></li>
           
              </ul>
              </div>
          <?php else: ?>

         
            <li class="nav-item">
            <a class="nav-link menu-text"  data-bs-toggle="modal" data-bs-target="#userModal" href="#"><i class="fas fa-user"></i></a>
          </li>
          <?php endif; ?>

          </ul>
        </div>
    </div>
  </nav>
  
  <!-- User feedback messages
  <?php include_once("messages.php"); ?>


  <?php 
include_once 'usermodal.php';
?>