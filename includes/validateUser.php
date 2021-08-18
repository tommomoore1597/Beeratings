<?php

//Register Form Validation 

function validateUser($user)
{


    $errors = array();
    
    if (empty($user['username'])){
        array_push($errors, 'Username is Required');
    }
    if (empty($user['email'])){
        array_push($errors, 'Email is Required');
    }

    if (empty($user['password'])){
        array_push($errors, 'Password is Required');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Password do not match');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser){
        array_push($errors, 'Email already exists');
    }

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $user['password']);
    $lowercase = preg_match('@[a-z]@', $user['password']);
    $number    = preg_match('@[0-9]@', $user['password']);
    $specialChars = preg_match('@[^\w]@', $user['password']);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($user['password']) < 8) {
        array_push($errors, 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
    }
    
    return $errors;
}

//form validation for updating user details in admin panel 
function validateUpdateUser($user)
{


    $errors = array();
    
    if (empty($user['username'])){
        array_push($errors, 'Username is Required');
    }
    if (empty($user['email'])){
        array_push($errors, 'Email is Required');
    }

    if (empty($user['password'])){
        array_push($errors, 'Password is Required');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Password do not match');
    }



    return $errors;
}

//validation for login form

function validateLogin($user)
{

    $errors = array();
    
    if (empty($user['username'])){
        array_push($errors, 'Username is Required');
    }

    if (empty($user['password'])){
        array_push($errors, 'Password is Required');
    }


    return $errors;
}





