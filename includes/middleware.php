
<?php 

//Allows only users access who are logged in 
function usersOnly()
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login first';
        $_SESSION['type'] = 'error';
        header('location: login.php');
        exit(0);
    }
}


//Allows only users access who are logged in 
function adminOnly()
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ../../index.php');
        exit(0);
    }
}
?>