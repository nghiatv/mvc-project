<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/1/16
 * Time: 9:17 AM
 */
class Login_Library
{
    public function checkInput($input)
    {
        $pattern = "/^[a-zA-Z0-9]{6,32}$/";
        $check = preg_match($pattern, $input);
        if ($check) {
            return true;
        } else {
            return "Invalid Username";
        }
    }


}