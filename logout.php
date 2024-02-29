<?php

if(isset($_POST['log_out_button'])){
    session_destroy();
    header("Location: auth/login.php");
    exit;
}