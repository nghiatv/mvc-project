<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 2:18 CH
 */
class Product_Controller extends Base_Controller
{
    public function indexAction(){
     $this->view->load('product');

    }
    public function viewAction($id){

        $this->view->load('product');
        $this->model->load('product');
//        var_dump($this->model->product->view($id));

    }
}