<?php
    require ("../includes/db.php");


    //getting data from product page
    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = 1;

        $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
        $stmt->bind_param("s",$pcode);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_code'] ?? '';

        //adding product to cart
        if(!$code){
            $query = $conn->prepare("INSERT INTO cart (product_name, product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)");

            $query->bind_param("sssiss", $pname,$pprice,$pimage,$pqty,$pprice,$pcode);

            $query->execute();
            
            echo '<div class="alert alert-success">
                   Item has been added! 
                </div>';

            } else{
                echo '<div class="alert alert-danger ">
                   Item is already in basket!
                     </div>';
            }
        }
        

        //retrieve cart data from table 
        if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
            $stmt = $conn->prepare("SELECT * FROM cart");
            $stmt->execute();
            $stmt->store_result();
            $rows = $stmt->num_rows;

            echo $rows;
        }

        //delete a product from cart
        if(isset($_GET['remove'])){
            $id = $_GET['remove'];

            $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
            $stmt->bind_param("i",$id);
            $stmt->execute();

            $_SESSION['showAlert'] = 'block';
            $_SESSION['cart_message'] = 'Item removed from Basket!';
            header('location:cart.php');
        }

        //delete everything from cart
        if(isset($_GET['clear'])){
            $stmt = $conn->prepare("DELETE FROM cart");
            $stmt->execute();

            $_SESSION['showAlert'] = 'block';
            $_SESSION['cart_message'] = 'Basket has been emptied!';
            header('location:cart.php');
            
        }

        //if quantity is increased update the cart
        if(isset($_POST['qty'])){
            $qty = $_POST['qty'];
            $pid = $_POST['pid'];
            $pprice = $_POST['pprice'];

            $tprice = $qty*$pprice;

            $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");

            $stmt->bind_param('isi',$qty,$tprice,$pid);
            $stmt->execute();

        }

        //if order is placed insert order details in order table and delete data from Cart
        if(isset($_POST['action']) && isset($_POST['action']) == 'order'){

            $fullname = $_POST['fullname']; 
            $email = $_POST['email'];
            $products = $_POST['products'];
            $grand_total = $_POST['grand_total'];
            $address = $_POST['address'];  
            $user_id = $_POST['user_id'];  
          
            

            $stmt = $conn->prepare("INSERT INTO orders (fullname,email,address,products,amount_paid,user_id)VALUES(?,?,?,?,?,?)" );
            $stmt->bind_param("sssssi",$fullname,$email,$address,$products,$grand_total,$user_id);
            $stmt->execute();
            $stmt2 = $conn->prepare('DELETE FROM cart');
            $stmt2->execute();
        
        
            }

    
?>