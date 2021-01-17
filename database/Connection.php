<?php
namespace Database;

use PDO;

class Connection{
    
    public static function connect(){
        $pdo = new PDO("mysql:dbname=testdb;host=127.0.0.1","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query,$params=[]){
        $connection = self::connect();
        $pdo = $connection->prepare($query,$params);
        $pdo->execute();
        if(explode(" ",$query)[0] == "SELECT"){
            return $pdo->fetchAll();
        }elseif(explode(" ",$query)[0] == "INSERT"){
            return $connection->lastInsertId();
        }

        return $pdo;
    }
}