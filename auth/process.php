<?php
session_start();
include("../db/config.php");
 
if (isset($_POST['login_button'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
 
    $sql = "SELECT username, password, name, id FROM `users` WHERE username = '$username';";
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dbusername = $row["username"];
            $dbpassword = $row["password"];
            $dbname = $row["name"];
            $dbid = $row["id"];
        }
 
        if ($username == $dbusername && $password == $dbpassword) {
            $_SESSION["active_user"] = $username;
            $_SESSION["user_name"] = $dbname;
            $_SESSION["user_id"] = $dbid;
            header("Location: ../index.php");
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    } else {
        header("Location: login.php");
        exit;
    }
}

if(isset($_POST['register_button'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        header('Location: login.php');
    }
    else{
        $sql = "INSERT INTO users (name, username , password)  VALUES ('$name', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: login.php");
            } else {
                header("Location: register.php");
            }
    }
}