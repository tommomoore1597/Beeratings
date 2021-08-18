<?php include_once("product.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

       

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../css/admin.css">
       

        <title>Admin Section - Manage Products</title>
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
                    <!-- displaying products table -->
                    <h2 class="page-title">Manage Products</h2>
                    <?php include_once("../../../includes/messages.php"); ?>
                    <table>
                        <thead>
                            
                            <th>Name</th>
                            <th>Price</th>
                            <th>ABV</th>
                            <th>Style</th>
                            <th>Stock</th>
                            
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php //Get product table data to be displayed 
                                foreach ($products as $key => $product):?>
                                <tr>
                                <td><?php echo $product['product_name']?></td>
                                <td>£<?php echo $product['product_price']?></td>
                                <td><?php echo $product['abv']?>%</td>
                                <td><?php echo $product['style']?></td>
                                <td><?php echo $product['stock']?></td>
                                <td><a href="edit.php?id=<?php echo $product['id'];?>" class="btn btn-success">Edit</a></td>
                                <td><a href="admin_products.php?del_id=<?php echo $product['id'];?>" class="btn btn-danger">Delete</a></td>
                                
                            </tr>
                            <?php endforeach;?>
                          
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <?php include_once("../includes/admin_footer.php"); ?>

    </body>

</html>