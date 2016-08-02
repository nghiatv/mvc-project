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


        $this->model->load('product'); //load model de ket noi co so du lieu nha
//        var_dump($this->model->product->getDb());
//        die();
//        $conn = new PDO("mysql:host=localhost;dbname=testmvc", "root", "");
//        try {
//
//            for ($i = 0; $i < 100; $i++) {
//                $stmt = $conn->prepare("INSERT INTO products ( product_name, product_price, product_description) VALUES ( 'San pham " . $i . " ',' " . $i . "000', 'Mo ta ve san pham')");
//
//                $stmt->execute();
//            }
//        } catch (PDOException $e) {
//            die($e->getMessage());
//        }

        // config gia tri
        $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 12; // post per page
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $links = (isset($_GET['links'])) ? $_GET['links'] : 2;// so trang hien thi xung quanh
        $query = "SELECT * FROM products";
        $this->library->load('pagination');
//        die();
        $this->library->pagination->load($this->model->product->getDb(), $query);
        $result = $this->library->pagination->getData($limit, $page);
        $pagination = $this->library->pagination->createLinks($links, "pagination pagination-sm");
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