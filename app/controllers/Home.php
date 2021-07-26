<?php

class Home extends Controller {
    public $home_model;
    public $data = [];

    public function __construct(){
        require_once 'app/models/HomeModel.php';
        $this->home_model = $this->model('HomeModel');
    }

    public function index(){
        if(!isset($_COOKIE['user']) && !isset($_SESSION['login'])){
            header('location:/login');
        } else {
            $dataEmployee = $this->home_model->getEmployeeList();
            $this->data['employeeList'] = $dataEmployee;
            $this->render('home/index',$this->data);
        }
    }

    public function getList(){
        $dataEmployee = $this->home_model->getEmployeeList();
        $this->data['employeeList'] = $dataEmployee;
        $this->render('home/index', $this->data);
    }

    public function store(){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];

        if(strlen($name) == 0 || strlen($address) == 0 || strlen($salary) == 0){
            echo 'Name, address and salary are required';
        }
        else if((float)$salary < 0){
            echo 'Salary must be bigger than 0';
        } else {
            $this->home_model->addNewEmployee($name, $address, $salary);
        } 
    }

    public function update(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        
        if(strlen($name) == 0 || strlen($address) == 0 || strlen($salary) == 0){
            echo 'Name, address and salary are required';
        }
        else if((float)$salary < 0){
            echo 'Salary must be bigger than 0';
        } else {
            $this->home_model->updateEmployee($id, $name, $address, $salary);
        } 
    }

    public function delete(){
        $id = $_POST['id'];
        $this->home_model->deleteEmployee($id);
    }

    public function test(){
        echo 'test';
    }
}