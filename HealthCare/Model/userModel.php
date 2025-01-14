<?php

function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'emedicine');
    return $con;
}

function login($username, $password){
    $con = getConnection();
    $sql = "select * from user where user_name='{$username}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count =  mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
}

function addUser($username, $password, $email, $phone, $gender, $address, $dob, $bloodGroup){
    $con = getConnection();
    $sql = "insert into user VALUES('', '{$username}', '{$password}', '{$email}', '{$phone}', '{$gender}', '{$address}', '{$dob}', '{$bloodGroup}')";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}



?>