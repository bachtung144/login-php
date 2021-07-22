<?php
class Logout extends Controller{
    public function clear(){
        session_start();
//        setcookie(session_name(), "", 1, $path); //send browser command remove sid from cookie
        if (isset($_COOKIE['user'])) {
            unset($_COOKIE['user']);
//            setcookie(session_name(), '', time() - 3600, '/'); // empty value and old timestamp
            setcookie('user', '', time() - 3600, "/");
        }
        session_destroy(); //remove sid-login from server storage
        session_write_close();
        header('location:/login');
    }
}