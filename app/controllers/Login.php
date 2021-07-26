<?php
class Login extends Controller {
    // Include the other controller in this controller

    public $login_model,$home_controller;
    public $error = '';

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
                $a_check = ((isset($_POST['remember'])!=0)?1:"");
                if($a_check==1){
                    setcookie('user', $_POST['username'], time() + 3600, "/");
                }
                header("location:/home");
            }
            else
            {
                $_SESSION['loginMessage'] = 'Wrong username or password';
                header('location: /login');
            }
        }
    }
}