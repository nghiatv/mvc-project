<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:32 CH
 */

class FT_Model_Loader{

    public function load($model){
        $class = ucfirst(strtolower($model)) . "_Model";

        if (!file_exists(PATH_APPLICATION . "/model/" . $class . ".php")) {
            die("Khong tim thay model");
        }
        require PATH_SYSTEM."/core/FT_Model.php";
        require PATH_APPLICATION . "/model/" . $class . ".php";

        $this->{$model} = new $class();
    }
}