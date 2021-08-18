<?php
  include_once("../../../includes/db.php"); 
  include_once("../../../includes/validatePosts.php"); 

  //table variable
    $table = 'blog';
// select all data from blog table 
    $posts = selectALL($table);


    // declare variables
    $errors = array();
    $id = '';
    $title = '';
    $body = '';
    $published = '';
    

    
    //adding new post to blog table
    if (isset($_POST['add-post'])){

       $errors = validatePost($_POST);

        if (!empty($_FILES['image']['name'])){
            $image_name = time() . '_' . $_FILES['image']['name'];
            $destination = "../../img/" . $image_name;

           $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST['image'] = $image_name;
            } else{
                array_push($errors, "Failed to upload image");
            }


        }else {
            array_push($errors, "Post image required");
        }

        if(count($errors) === 0){
            unset($_POST['add-post']);
            
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post = create($table, $_POST);
            $_SESSION['message'] = 'Post created successfully';
            $_SESSION['type'] = 'success';
            header('location: admin_posts.php');
            exit();
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $published = isset($_POST['published']) ? 1 : 0;
        }

    }



    //check for blog post ID
    if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $published = $post['published'];
}

    //delete blog post
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = 'Post deleted Successfully';
        $_SESSION['type'] = 'success';
        header('location: admin_posts.php');
        exit();

    }


    //Publish post 
    if (isset($_GET['published']) && isset($_GET['p_id'])){
        $published = $_GET['published'];
        $p_id = $_GET['p_id'];
        $count = update($table, $p_id, ['published' => $published]);
        $_SESSION['message'] = 'Post Published';
        $_SESSION['type'] = 'success';
        header('location: admin_posts.php');
        exit();
}

    //update blog post
    if(isset($_POST['update-post'])){

        $errors = validatePost($_POST);

        if (!empty($_FILES['image']['name'])){
            $image_name = time() . '_' . $_FILES['image']['name'];
            $destination = "../../img/" . $image_name;

           $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST['image'] = $image_name;
            } else{
                array_push($errors, "Failed to upload image");
            }


        }else {
            array_push($errors, "Post image required");
        }

        if(count($errors) === 0){
            $id = $_POST['id'];
            unset($_POST['update-post'], $_POST['id']);
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $post = update($table, $id, $_POST);
            $_SESSION['message'] = 'Post updated Successfully';
            $_SESSION['type'] = 'success';
            header('location: admin_posts.php');
            exit();

        }else{
            $id = $_POST['id'];
            $title = $_POST['title'];
            $body = $_POST['body'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;

        }
      

    }

   