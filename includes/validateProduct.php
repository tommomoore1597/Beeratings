<?php

//Product form Validation 

function validateProduct($product)
{


    $errors = array();
    
    if (empty($product['product_name'])){
        array_push($errors, 'product title is Required');
    }
  
    if (empty($product['product_description'])){
        array_push($errors, 'Description is Required');
    }

    if (empty($product['style'])){
        array_push($errors, 'Description is Required');
    }

    if (empty($product['product_price'])){
        array_push($errors, 'Price is Required');
    }

    if (empty($product['stock'])){
        array_push($errors, 'Stock amount is Required');
    }




    return $errors;
}
