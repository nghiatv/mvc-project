<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 2:18 CH
 */
class Product_Controller extends Base_Controller
{
    public function indexAction()
    {


        $this->model->load('product');
//        var_dump($this->model->product->getDb());
//        die();
        $conn = new PDO("mysql:host=localhost;dbname=testmvc","root","");



        $limit = (isset($_GET['limit'])) ? $_GET['limit'] :48;
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $links = (isset($_GET['links'])) ? $_GET['links'] : 1;
        $query = "SELECT * FROM products";
        $this->library->load('pagination');
//        die();
        $this->library->pagination->load($this->model->product->getDb(),$query);
        $result = $this->library->pagination->getData($limit,$page);
        $pagination = $this->library->pagination->createLinks($links,"");
//        var_dump($pagination); exit;
        $this->view->load('shop', array(
            'result' => $result,
            'pagination' => $pagination
        ));
    }

    public function viewAction($id)
    {


        $this->model->load('product');
        $result = $this->model->product->view($id);
        $this->view->load('product', array(
            'product' => $result
        ));
//        var_dump($result);
//        exit;
//        var_dump($this->model->product->view($id));

    }
}