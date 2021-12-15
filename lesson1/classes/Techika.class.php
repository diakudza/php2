<?php

include 'Phone.class.php';
include 'TV.class.php';
include 'WashingMachine.class.php';

class Techika
{
    private $title;
    private $description;
    private $weight;
    private $price;
    private $type;

    public function __construct($title='empty',$description='empty',$weight=0,$price=0)

    {
        $this->title = $title;
        $this->description = $description;
        $this->weight = $weight;
        $this->price = $price;
        $this->type = self::getType();
    }

    function view(){
        echo "Brand: $this->title <br>description: $this->description<br>weight: $this->weight kg<br>price: $this->price usd<br>";
    }

    function getType(){
        return get_class($this);
    }


}