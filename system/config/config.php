<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:27 CH
 */
//Thong so ve database
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_DBNAME','testmvc');

//thong so ve action va controller
//define('CONTROLLER_DEFAULT','index');
//define('ACTION_DEFAULT','index');
define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}