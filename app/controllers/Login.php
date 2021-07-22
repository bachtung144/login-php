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

        if (isset($_POST['username']) && isset($_POST['password'])) //when form submitted
        {
            $check_login = $this->login_model->handleLogin();
            if ($check_login)
            {
                $_SESSION['login'] = $_POST['username']; //write login to server storage
                setcookie('user', $_POST['username'], time() + 3600, "/");
                header("location:/home");
            }
            else
            {
                echo "<script>alert('Wrong login or password');</script>";
                echo "<noscript>Wrong login or password</noscript>";
            }
        }
//        $check_login = $this->login_model->handleLogin();
//        if ($check_login){
//            header("location:/home");
//        }
//        else{
//            $message = "wrong pass";
//            echo "<script type='text/javascript'>alert('$message');</script>"; //bug chuyen trang
//        }
    }
}