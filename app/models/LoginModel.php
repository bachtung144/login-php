<?php
class LoginModel{
    protected $table = 'users';

    public function handleLogin(){
        $user_name=$_POST['username'];
        $password=($_POST['password']);
        if ($user_name === 'admin' && $password === 'admin') {
            return true;
        }
        return false;
    }
}
