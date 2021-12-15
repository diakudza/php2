<?php

class TV extends Techika
{
    private $diagonale;
    private $wiFi;
    private $smartTV;

    public function __construct($title='empty',$description='empty',$weight=0,$price=0,$diagonale=0,$wiFi=true,$smartTV='')

    {

        parent::__construct($title, $description, $weight, $price);
        $this->diagonale = $diagonale;
        $this->wiFi = $wiFi;
        $this->smartTV = $smartTV;

    }

    function view(){
        parent::view();
        echo "smartTV: {$this->smartTV}<br>  diagonale: {$this->diagonale} \" <br>";
        echo $this->wiFi?"WiFi: +<br>":'';
    }
}