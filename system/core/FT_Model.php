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
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DBNAME,DB_USER,DB_PASS) or die("ahihi");
        }
        catch (PDOException $e){
            die($e->getMessage());
        }

    }
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