<?php

class Home extends Controller {
    public $home_model;
    public $data = [];

    public function __construct(){
        require_once 'app/models/HomeModel.php';
        $this->home_model = $this->model('HomeModel');
    }

    public function index(){
        $dataProduct = $this->home_model->getProductList();
        $this->data['product_list'] = $dataProduct;
        print_r($dataProduct);
        $this->render('home/index',$this->data);
    }

    public function getListProduct(){
        $dataProduct = $this->home_model->getProductList();
        $this->data['product_list'] = $dataProduct;
        print_r($dataProduct);
        $this->render('home/index',$this->data);
    }

    public function test(){
        echo 'test';
    }
}