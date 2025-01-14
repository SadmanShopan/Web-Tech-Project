<?php
require_once('../Model/userModel.php');
if(isset($_POST['submit'])){
    $username  =  trim($_REQUEST['user_name']);
    $password  =  trim($_REQUEST['password']);
    $email  =  trim($_REQUEST['email']);
    $phone  =  trim($_REQUEST['phone']);
    $gender  =  trim($_REQUEST['gender']);
    $address  =  trim($_REQUEST['address']);
    $dob  =  trim($_REQUEST['dob']);
    $bloodGroup  =  trim($_REQUEST['blood_group']);

    if($username == null || empty($password) || empty($email) ){
        echo "Null data found!";
    }else {
        $status = addUser($username, $password, $email, $phone, $gender, $address, $dob, $bloodGroup);
        if($status){
            header('location: ../View/login.html');
        }else{
            header('location: ../View/signup.html');
        }
    }
}else{
    header('location: ../View/signup.html');
}
?>