<?php

//Review Form Validation 

function validateReview($review)
{


    $errors = array();
    
    if (empty($review['name'])){
        array_push($errors, 'Review Name is Required');
    }
  
    if (empty($review['body'])){
        array_push($errors, 'Body is Required');
    }
    if (empty($review['rating'])){
        array_push($errors, 'Rating is Required');
    }
  
    

    return $errors;
}
