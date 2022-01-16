<?php   
class Gallery 
{   
    public $dbh;

    static function generate($dbh,$dir){
        $i=0;
        $gallery=[];
        $query=$dbh->query('SELECT * FROM pic ORDER BY `counts` DESC');
        foreach ($query as $img){
            ++$i;
            $gallery[]=['id'=>$img['id'],'name'=>$img['name']];
        }
        return $gallery;
    }
}
