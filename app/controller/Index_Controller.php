<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 5:02 CH
 */
class Index_Controller extends Base_Controller
{

    public function indexAction()
    {


        $this->model->load('index');
        $re = $this->model->index->getAllUsers();
        $this->view->load('index', array(
            're' => $re
        ));

        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
    }
}