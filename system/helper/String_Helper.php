<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 4:20 CH
 */


if(!defined("PATH_SYSTEM")) die("Bad request");


function str_to_int($str){
    return sprintf("%u",crc32($str));
}