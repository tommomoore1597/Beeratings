<?php include("../../../includes/users.php");

?>
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

        <title>Admin Section - Edit User</title>
    </head>

    <body>
        
    <?php include_once("../includes/admin_header.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

        <?php include_once("../includes/admin_sidemenu.php"); ?>
            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-primary">Add User</a>
                    <a href="admin_users.php" class="btn btn-primary">Manage Users</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Edit User</h2>
                    <!-- edit new user form -->
                    <?php include("../../../includes/formErrors.php"); ?>
                    <div class="container">
                    <div class="row">
                        <div class="col">
                        <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <div class="form-group">
                            <label class="mb-2">Username</label>
                            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Email</label>
                            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password Confirmation</label>
                            <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <?php if (isset($admin) && $admin == 1): ?>
                                <label>
                                    <input type="checkbox" name="admin" checked>
                                    Admin
                                </label>
                            <?php else: ?>
                                <label>
                                    <input type="checkbox" name="admin">
                                    Admin
                                </label>
                            <?php endif; ?>
                            
                        </div>

                        <div>
                            <button type="submit" name="update-user" class="btn btn-primary">Update User</button>
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