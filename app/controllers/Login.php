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
//            if ($check_login->num_rows > 0) {
//                // output data of each row
//                while($row = $check_login->fetch_assoc()) {
//                    echo "id: " . $row["userid"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
//                }
//            } else {
//                echo "0 results";
//            }
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
    }
}