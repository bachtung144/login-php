<?php
class Login extends Controller {
    // Include the other controller in this controller

    public $login_model,$home_controller;

    public function __construct(){
        require_once 'app/models/LoginModel.php';
        require_once 'app/controllers/Home.php';
        $this->login_model = $this->model('LoginModel');
        $this->home_controller = new Home();
    }

    public function index(){
        require_once 'app/views/login/index.php';
    }

    function run()
    {
        $check_login = $this->login_model->handleLogin();
        if ($check_login){
//            require_once 'app/views/home/index.php';
            $this->home_controller->getListProduct();
        }
        else{
            $message = "wrong pass";
            echo "<script type='text/javascript'>alert('$message');</script>"; //bug chuyen trang
        }
    }
}