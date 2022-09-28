<?php
    namespace models;

class Conexion{
    
    //localhost
    public static $user="root";
    public static $pass="";
    public static $URL="mysql:host=localhost;dbname=modelbookchile";
    
    

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        }catch(\PDOException $e){
            return null;
        }
    }   
}