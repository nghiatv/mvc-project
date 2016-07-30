<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 27/07/2016
 * Time: 10:01 CH
 */

// duong dan toi cac file he thong
define('PATH_SYSTEM', dirname(__DIR__) . '/system');
define('PATH_APPLICATION', dirname(__DIR__) . '/app');

define('BASE_URL','http://localhost/mvc-project');


require_once PATH_SYSTEM . "/config/config.php";

//Danh sach tham so


//bao gom CONTROLLER va ACTION



require PATH_SYSTEM . "/core/application.php";


$app = new Application();