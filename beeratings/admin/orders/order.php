<?php
  include_once("../../../includes/db.php"); 
  include_once("../../../includes/validatePosts.php"); 

    // table vairable
    $table = 'orders';
  //select table data
    $orders = selectALL($table);


//declare variables
    $errors = array();
    $id = '';

    


    //check for order ID
    if (isset($_GET['id'])) {
    $order = selectOne($table, ['id' => $_GET['id']]);

    $id = $order['id'];
    $fullname = $order['fullname'];
    $email = $order['email'];
    $address = $order['address'];
}

// delete an order from table
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = 'Order deleted Successfully';
        $_SESSION['type'] = 'success';
        header('location: admin_orders.php');
        exit();

    }

