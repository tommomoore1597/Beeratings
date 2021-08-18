<!DOCTYPE html>
<?php include_once("post.php"); ?>
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

        <title>Admin Section - Add Post</title>
    </head>

    <?php include_once("../includes/admin_header.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

        <?php include_once("../includes/admin_sidemenu.php"); ?>


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-primary">Add Post</a>
                    <a href="admin_posts.php" class="btn btn-primary">Manage Posts</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Add Posts</h2>
                    <?php 
                include_once('../../../includes/formErrors.php');
                
                ?>

                <!-- add new blog post form -->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                            <form action="create.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class=" mb-2">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title ;?>" >
                        </div>
                        <div class="form-group">
                            <label class=" mb-2">Body</label>
                            <textarea name="body"  class="form-control" value="<?php echo $body ;?>" id="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label class=" mb-2" >Image</label>
                            <input type="file" name="image" class="form-control"  >
                        </div>
                       <div class="form-group">
                           <?php if (empty($published)):?>
                           <label>
                               <input type="checkbox"   name="published" >
                               Publish
                           </label>
                            <?php else: ?>
                                <label>
                               <input type="checkbox"  name="published" checked>
                               Publish
                           </label>

                            <?php endif; ?>
                       </div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-primary">Add Post</button>
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