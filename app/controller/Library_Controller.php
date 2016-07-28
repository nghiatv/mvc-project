<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 3:41 CH
 */

if(!defined('PATH_SYSTEM')) die("Bad request");


class Library_Controller extends Base_Controller{
    public function indexAction(){
        $this->library->load('upload');
        $this->library->upload->upload();

        echo "<pre>";
        var_dump($this->library);
        echo "</pre>";


    }
}