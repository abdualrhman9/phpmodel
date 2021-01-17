<?php
namespace ModelPack\Contracts;

use Database\Connection;

abstract class Model extends Connection{

    static $table ;

    public static function all(){
        
        $table = get_called_class()::$table ?? strtolower(basename(get_called_class()))."s" ;
        return self::query("SELECT * FROM $table");
    }

    public static function where($params=[]){
        $query = "";
        $i = 0;
        $count = count($params);
        foreach($params as $field => $value){
            $operator = $i==$count-1 ?"AND" : "";
            $query .= "WHERE $field=$value $operator ";
            $i++;
        }
        self::query($query);
    }

    // User::where(['name'=>'jack']);

}
