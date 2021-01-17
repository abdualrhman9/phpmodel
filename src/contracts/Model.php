<?php
namespace ModelPack\Contracts;

use Database\Connection;

abstract class Model extends Connection{

    static $table ;

    public static function all(){
        
        $table = get_called_class()::$table ?? strtolower(basename(get_called_class()))."s" ;
        return self::query("SELECT * FROM $table");
    }

}