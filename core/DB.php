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
            $con = new PDO($connect_str,self::DB_USER,self::DB_PASS);
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $con;

        }
        catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }

   //insert("goods",['title'=>'Товар 1','price'=>100])
    static function  Insert($table, $object) {

        $columns = array();

        foreach ($object as $key => $value) {

            $columns[] = $key;
            $masks[] = ":$key";

            if ($value === null) {
                $object[$key] = 'NULL';
            }
        }

        $columns_s = implode(',', $columns);//"'title','price'"
        $masks_s = implode(',', $masks);//"'title','price'"

        $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";

        $q = self::on()->prepare($query);
        $q->execute($object);

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

       // return self::Insert()->lastInsertId();
    }

    static public function Update($table, $object, $where) {

        $sets = array();

        foreach ($object as $key => $value) {

            $sets[] = "$key=:$key";

            if ($value === NULL) {
                $object[$key]='NULL';
            }
        }

        $sets_s = implode(',',$sets);
        $query = "UPDATE $table SET $sets_s WHERE $where";

        $q = self::on()->prepare($query);
        $q->execute($object);

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }
}