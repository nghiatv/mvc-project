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
     $this->view->load('shop');

    }
    public function viewAction($id){


        $this->model->load('product');
        $result = $this->model->product->view($id);
        $this->view->load('product',array(
            'product' => $result
        ));
//        var_dump($result);
//        exit;
//        var_dump($this->model->product->view($id));

    }
}