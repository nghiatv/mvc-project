<?php
if (!defined('PATH_SYSTEM')) die("Bad request");
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 7/30/16
 * Time: 10:43 AM
 */

require PATH_SYSTEM."/core/FT_Model.php";

class Base_Model extends FT_Model
{
    public function __construct()
    {
        parent::__construct();
    }


}