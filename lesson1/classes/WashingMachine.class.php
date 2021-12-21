<?php

class WashingMachine extends Techika
{
    private $maxLoad;
    private $maxTurn;
    private $wiFi;

    public function __construct($title='empty',$description='empty',$weight=0,$price=0,$maxLoad=5,$maxTurn=1000,$wiFi=no)

    {

        parent::__construct($title, $description, $weight, $price);
        $this->maxLoad = $maxLoad;
        $this->maxTurn = $maxTurn;
        $this->wiFi = $wiFi;

    }
    function view(){
        parent::view();
        echo "maxLoad: {$this->maxLoad} kg<br>maxTurn: {$this->maxTurn}rpm<br>";
        echo $this->wiFi?"Wifi: +<br>":'';
    }

}