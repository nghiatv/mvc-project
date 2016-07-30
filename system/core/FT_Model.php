<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 28/07/2016
 * Time: 1:33 CH
 */

class FT_Model
{
    protected $db;
    protected $stmt;
    public function __construct()
    {
        try{
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DBNAME,DB_USER,DB_PASS) or die("Không thể kết nối tới cơ sở dữ liệu");
            $this->db->exec("SET CHARACTER SET utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }

    }


}