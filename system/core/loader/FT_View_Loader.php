<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:32 CH
 */
class FT_View_Loader
{
    private $__content = array();

    public function load($view, $data = array())
    {
        // chuyen du lieu trong mang thanh tung bien
        extract($data);
        // Chuyen noi dung  view thanh bien thanh vi in chung thanh bien ab_start();

        ob_start();
        require PATH_APPLICATION . "/view/" . $view . ".php";
        $content =  ob_get_contents();

        ob_clean();

        // gan noi dung vao danh sach view da load

        $this->__content[] = $content;
    }

    public function show(){
        foreach($this->__content as $html){
            echo $html;
        }
    }
}