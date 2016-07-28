<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 27/07/2016
 * Time: 10:01 CH
 */

// duong dan toi cac file he thong
define('PATH_SYSTEM', __DIR__ . '/system');
define('PATH_APPLICATION', __DIR__ . '/app');




require_once PATH_SYSTEM."/config/config.php";

//Danh sach tham so
//bao gom CONTROLLER va ACTION

require_once PATH_SYSTEM."/core/FT_Common.php";

// Chay truong trinh

FT_load();