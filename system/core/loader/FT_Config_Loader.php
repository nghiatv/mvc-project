<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 3:14 CH
 */
class FT_Config_Loader
{

    protected $config = array();


    public function load($config)
    {
        if (file_exists(PATH_APPLICATION . "/config/" . $config . ".php")) {
            $config = include_once PATH_APPLICATION."/config/".$config.".php";

            if(!empty($config)){
                foreach($config as $key => $value){
                    $this->config[$key] = $value;
                }
            }
            return true;
        }
        return false;

    }
    public function item($key, $default_value = ''){
        return isset($this->config[$key]) ? $this->config[$key] : $default_value;
    }
    public function set_item($key,$value){
        $this->config[$key] = $value;
    }
}