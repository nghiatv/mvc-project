<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 7/30/16
 * Time: 10:43 AM
 */



class Product_Model extends FT_Model
{
    public function view($id){
       try{
           $this->stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
           $this->stmt->bindParam(1,$id,PDO::PARAM_INT);
           $this->stmt->execute();

           $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
       } catch (PDOException $e){
           die($e->getMessage());
       }

        return $result;

    }

}