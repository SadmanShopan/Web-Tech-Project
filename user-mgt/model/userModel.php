<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count =  mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($username, $password, $email){
        $con = getConnection();
        $sql = "insert into users VALUES('', '{$username}', '{$password}', '{$email}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function getUser($id){
        $con = getConnection();
        $sql = "select * from users where id='{$id}'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1){
            return mysqli_fetch_assoc($result);
        }else{
            return null;
        }

    }

    function getAllUser(){
        $con = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);

        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        return $users;

    }

    function updateUser($user){
        $con = getConnection();
        $sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id='{$user['id']}'";

        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }

    }

    function deleteUser($id){
        $con = getConnection();
        $sql = "delete from users where id='{$id}'";

        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }
?>