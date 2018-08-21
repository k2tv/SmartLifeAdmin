<?php
    session_start();
    if(isset($_COOKIE['username'])){
       // header("location:login.html");
        setcookie("username", $_COOKIE['username'], time()+60*60); //60分钟  一天 24*60*60
    }else{
        setcookie("username", ""); 
        header("location:/Smart/login.php");
    }

?>