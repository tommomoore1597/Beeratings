<?php
  include_once("../../../includes/db.php"); 
  include_once("../../../includes/validateReviews.php"); 

    //table variable
    $table = 'reviews';
    //Get review data from table
    $reviews = selectALL($table);


    //initialise variables 
    $errors = array();
    $id = '';
    $name = '';
    $body = '';
    $rating = '';
    

    
    //add new review
    if (isset($_POST['add-review'])){

       $errors = validateReview($_POST);

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
            array_push($errors, "Review image required");
        }

        if(count($errors) === 0){
            unset($_POST['add-review']);
            
            $_POST['body'] = htmlentities($_POST['body']);

            $post = create($table, $_POST);
            $_SESSION['message'] = 'Review created successfully';
            $_SESSION['type'] = 'success';
            header('location: admin_reviews.php');
            exit();
        }else{
            $name = $_POST['name'];
            $body = $_POST['body'];
            $rating = $_POST['rating'];
            
        }

    }



    //get review ID
    if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);

    $id = $post['id'];
    $name = $post['name'];
    $body = $post['body'];
    $rating = $post['rating'];
}


    //delete review
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = 'Review deleted Successfully';
        $_SESSION['type'] = 'success';
        header('location: admin_reviews.php');
        exit();

    }

    //update reviews 
    if(isset($_POST['update-review'])){

        $errors = validateReview($_POST);

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
            array_push($errors, "Review image required");
        }

        if(count($errors) === 0){
            $id = $_POST['id'];
            unset($_POST['update-review'], $_POST['id']);
            $post = update($table, $id, $_POST);
            $_SESSION['message'] = 'Review updated Successfully';
            $_SESSION['type'] = 'success';
            header('location: admin_reviews.php');
            exit();

        }else{
            $id = $_POST['id'];
            $name = $_POST['name'];
            $body = $_POST['body'];
            $rating = $_POST['rating'];
            
        }
      

    }

   