<?php
session_start();
require_once('../model/userModel.php');

if(isset($_POST['submit'])){
    $username  =  trim($_REQUEST['username']);
    $password  =  trim($_REQUEST['password']);

    if($username == null || empty($password) ){
        echo "Null data found!";
    }else {

        $status = login($username, $password);
        if ($status){
            setcookie('flag', 'true', time()+3600, '/');
            $_SESSION['username'] = $username;
            header('location: ../View/userHome.php');
        }else{
            //var_dump($_SESSION['user']);
            echo "Invalid user";
        }
    }
}else{
    //echo "Invalid request!";
    header('location: ../view/login.html');
}
?>