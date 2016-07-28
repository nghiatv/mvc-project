<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:31 CH
 */


if(!defined("PATH_SYSTEM")) die("Bad request");


class FT_Helper_Loader{


    public function load($helper){
        $helper = ucfirst(strtolower($helper))."_Helper";
        require_once PATH_SYSTEM."/helper/".$helper.".php";

    }
}