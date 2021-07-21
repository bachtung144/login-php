<?php
class Login extends Controller {

    public $login_model;

    public function __construct(){
        require_once 'app/models/LoginModel.php';
        $this->login_model = $this->model('LoginModel');
    }

    public function index(){
        require_once 'app/views/login/index.php';
    }

    function run()
    {
        $check_login = $this->login_model->handleLogin();
        if ($check_login){
            require_once 'app/views/home/index.php';
        }
        else{
            $message = "wrong pass";
            echo "<script type='text/javascript'>alert('$message');</script>"; //bug chuyen trang
        }
    }
}