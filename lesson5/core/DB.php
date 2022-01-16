<?php


class DB
{
    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'phpgb';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    static function on() {
        try
        {
            $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
            return  (new PDO($connect_str,self::DB_USER,self::DB_PASS));

        }
        catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }
}