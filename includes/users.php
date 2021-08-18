<?php



include_once("db.php");
include("validateUser.php");

//table variable
$table = 'users';
//selecing users from database
$users = selectALL($table);

//initialise variables
$errors = array();
$id = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$admin = '';

// Login user
function Loginuser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Login Successful';

    if ($_SESSION['admin']){
        header('location:  ../beeratings/admin/users/admin_users.php');
    } else {
        header('location: ../beeratings/index.php');
         }

    
    
    exit();
}


//Register User in DB
if (isset($_POST['register-btn'])) { 

    $errors = validateUser($_POST);
   

   if (count($errors) === 0) {
    unset($_POST['register-btn'], $_POST['passwordConf']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (isset($_POST['admin'])){
        $_POST['admin'] = 1;
        $user_id = create($table, $_POST);
        $_SESSION['message'] = "New user created successfully";
        $_SESSION['type'] = "success";
        header('location:  admin_users.php');
        exit();
    }else{
        $_POST['admin'] = 0;
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
      
        //log user in after registering
       loginUser($user);

    }

   } else {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];

   }

   
}


//creating user using admin panel 
if (isset($_POST['create-user'])) { 

    $errors = validateUser($_POST);

   if (count($errors) === 0) {
    unset($_POST['create-user'], $_POST['passwordConf']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //checking if the new user is an admin or not
    if (isset($_POST['admin'])){
        $_POST['admin'] = 1;
        $user_id = create($table, $_POST);
        $_SESSION['message'] = "New admin created successfully";
        $_SESSION['type'] = "success";
        header('location:  admin_users.php');
        exit();
    }else{
        $_POST['admin'] = 0;
        $user_id = create($table, $_POST);
        $_SESSION['message'] = "New user created successfully";
        $_SESSION['type'] = "success";
        header('location:  admin_users.php');
        exit();

    }

   } else {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $admin = isset($_POST['admin']) ? 1 : 0;

   }

   
}

//update user in admin panel 
if(isset($_POST['update-user'])){
    $errors = validateUpdateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
  
         $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
         $user_id = update($table, $id, $_POST);
         $_SESSION['message'] = "User has been updated";
         $_SESSION['type'] = "success";
         header('location:  admin_users.php');
         exit();
 
    } else {
 
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         $passwordConf = $_POST['passwordConf'];
         $admin = isset($_POST['admin']) ? 1 : 0;
 
    }

}

//getting one user details
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}


//login in user
if (isset($_POST['login-btn'])){
    $errors = validateLogin($_POST);

    if (count($errors) === 0 ){
        $user = selectOne($table, ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'], $user['password'])){
            loginUser($user);
        
    if ($_SESSION['admin']){
        header('location: ../beeratings/admin/admin_users.php');
    } else {
        header('location: ../beeratings/index.php');
         }

    
    
    exit();
        } else {
            array_push($errors, 'Incorrect Username/password combination');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];



}

//Delete user table using the admin panel 
if (isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $count = delete($table, $id); 
    $_SESSION['message'] = "User has been deleted";
    $_SESSION['type'] = "success";
    header('location:  admin_users.php');
    exit();
}
