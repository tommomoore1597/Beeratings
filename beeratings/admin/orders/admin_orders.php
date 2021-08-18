<?php include_once("order.php");

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
       

        <title>Admin Section - Manage Orders</title>
    </head>

    <body>
        <?php include_once("../includes/admin_header.php"); ?>

         <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

        <?php include_once("../includes/admin_sidemenu.php"); ?>


        <div class="admin-content">
                <div class="button-group">
               
                </div>
                
                

                <div class="content">

                    <h2 class="page-title">Manage Orders</h2>
                    <?php include_once("../../../includes/messages.php"); ?>
                    <table>
                        <thead>
                            
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Products</th>
                            <th>Amount Paid</th>
                            
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php 
                            //Get order table data and display
                            foreach ($orders as $key => $order):?>
                                <tr>
                                
                                <td><?php echo $order['fullname']?></td>
                                <td><?php echo $order['email']?></td>
                                <td><?php echo $order['address']?></td>
                                <td><?php echo $order['products']?></td>
                                <td>£<?php echo $order['amount_paid']?></td>

                                <td><a href="admin_orders.php?del_id=<?php echo $order['id'];?>" class="btn btn-danger">Delete</a></td>
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