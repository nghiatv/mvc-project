<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 7/29/16
 * Time: 4:01 PM
 */
class Login_Model extends FT_Model
{
    function checkUser($user, $pass)
    {
//        die("123");
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name = ? AND user_pass = ?");
            $stmt->bindParam(1, $user);
            $stmt->bindParam(2, $pass);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }


    }
}