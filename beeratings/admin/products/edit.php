<?php include_once("product.php"); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

    
              <!-- Admin Styling -->
              <link rel="stylesheet" href="../../css/admin.css">

        <title>Admin Section - Edit Products</title>
    </head>

    <body>
    <?php include_once("../includes/admin_header.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

        <?php include_once("../includes/admin_sidemenu.php"); ?>



            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-primary">Add Product</a>
                    <a href="admin_products.php" class="btn btn-primary">Manage Products</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Edit Product</h2>
                    <?php 
                include_once('../../../includes/formErrors.php');
                ?>
                  
                  <!-- edit products form -->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                            <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="form-group">
                            <label class="mb-2">Name</label>
                            <input type="text" name="product_name" value="<?php echo $product_name ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Price (£)</label>
                            <input name="product_price" class="form-control" value="<?php echo $product_price ?>"> 
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Style</label>
                            <input type="text" name="style" class="form-control" value="<?php echo $style ?>">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">ABV (%)</label>
                            <input type="text" name="abv" class="form-control" value="<?php echo $abv ?>">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Description</label>
                            <input type="text" name="product_description" class="form-control" value="<?php echo $product_description ?>">
                        </div>
                    
                        <div class="form-group">
                            <label class="mb-2">stock</label>
                            <input type="text" name="stock" class="form-control" value="<?php echo $stock ?>">
                        </div>
                    
                        <div class="form-group">
                            <label class="mb-2">Image</label>
                            <input type="file" name="product_image" class="form-control" >
                        </div>
                           
                              
                        </div>
                        <div>
                            <button type="submit" name="update-product" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>


                    </div>
                </div>
            </div>
                    

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <?php include_once("../includes/admin_footer.php"); ?>

    </body>

</html>