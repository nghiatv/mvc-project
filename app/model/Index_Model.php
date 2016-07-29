<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 6:24 CH
 */
class Index_Model extends FT_Model
{
    public function getAllUsers()
    {
        try{
            $sql = "SELECT * FROM users WHERE  1";
            $this->stmt = $this->db->prepare($sql);
            $this->stmt->execute();
        } catch(PDOException $e){
            die($e->getMessage());
        }
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}