<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:31 CH
 */

if (!defined('PATH_SYSTEM')) die('Bad request');


class FT_Libraty_Loader
{
    public function load($library, $args = array())
    {
        if (empty($this->{$library})) {
            $class = ucfirst(strtolower($library)) . "_Library";

            require(PATH_SYSTEM . '/library/' . $class . '.php');

            $this->{$library} = new $class($args);


        }
    }
}