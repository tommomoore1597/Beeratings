<?php
  include_once("../../../includes/db.php"); 
  include_once("../../../includes/validateProduct.php"); 

    //table variable
    $table = 'products';
    //select product data from table
    $products = selectALL($table);


    //declare variables
    $errors = array();
    $id = '';
    $product_name = '';
    $product_description = '';
    $style = '';
    $stock = '';
    $product_price = '';
    $abv = '';
    

    
    // add new product
    if (isset($_POST['add-product'])){

       $errors = validateProduct($_POST);

        if (!empty($_FILES['product_image']['name'])){
            $image_name = time() . '_' . $_FILES['product_image']['name'];
            $destination = "../../img/" . $image_name;

           $result = move_uploaded_file($_FILES['product_image']['tmp_name'], $destination);

            if ($result) {
                $_POST['product_image'] = $image_name;
            } else{
                array_push($errors, "Failed to upload image");
            }


        }else {
            array_push($errors, "Product image required");
        }

        if(count($errors) === 0){
            unset($_POST['add-product']);
            

            $post = create($table, $_POST);
            $_SESSION['message'] = 'Product created successfully';
            $_SESSION['type'] = 'success';
            header('location: admin_products.php');
            exit();
        }else{
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $style = $_POST['style'];
            $stock = $_POST['stock'];
            $product_price = $_POST['product_price'];
            $abv = $_POST['abv'];
        }

    }



    //get product ID 
    if (isset($_GET['id'])) {
        $product = selectOne($table, ['id' => $_GET['id']]);
            $id = $product['id'];
            $product_name = $product['product_name'];
            $product_description = $product['product_description'];
            $style = $product['style'];
            $stock = $product['stock'];
            $product_price = $product['product_price'];
            $abv = $product['abv'];
}


    //delete product 
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = 'Product deleted Successfully';
        $_SESSION['type'] = 'success';
        header('location: admin_products.php');
        exit();

    }


    //update product information 
    if(isset($_POST['update-product'])){

        $errors = validateProduct($_POST);

        if (!empty($_FILES['product_image']['name'])){
            $image_name = time() . '_' . $_FILES['product_image']['name'];
            $destination = "../../img/" . $image_name;

           $result = move_uploaded_file($_FILES['product_image']['tmp_name'], $destination);

            if ($result) {
                $_POST['product_image'] = $image_name;
            } else{
                array_push($errors, "Failed to upload image");
            }


        }else {
            array_push($errors, "Product image required");
        }

        if(count($errors) === 0){
            $id = $_POST['id'];
            unset($_POST['update-product'], $_POST['id']);
            $product = update($table, $id, $_POST);
            $_SESSION['message'] = 'Product updated Successfully';
            $_SESSION['type'] = 'success';
            header('location: admin_products.php');
            exit();

        }else{
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $style = $_POST['style'];
            $stock = $_POST['stock'];
            $product_price = $_POST['product_price'];
            $abv = $_POST['abv'];

        }
      

    }

   