<?php

class Database{
    public static function connect(){
        $data_base = new mysqli('localhost', 'root', 'rolito123', 'tienda_master');
        $data_base->query("SET NAMES 'utf8'");
        return $data_base;
    }
}