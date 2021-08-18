<?php
session_start();
//log out script
unset($_SESSION['id']); 
unset($_SESSION['username'] );
unset($_SESSION['admin']); 
unset($_SESSION['message']);
session_destroy();

header('location: ../beeratings/index.php');