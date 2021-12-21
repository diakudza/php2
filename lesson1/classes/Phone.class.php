<?php


class Phone extends Techika
{
    private $diagonale;
    private $os;
    private $g5;

    public function __construct($title='empty',$description='empty',$weight=0,$price=0,$diagonale=0,$os='no',$g5=true)

    {
        parent::__construct($title, $description, $weight, $price);
        $this->diagonale = $diagonale;
        $this->os = $os;
        $this->g5 = $g5;
    }

    function view(){
        parent::view();
        echo "diagonale: {$this->diagonale} \" <br>OS: {$this->os}<br>";
        echo $this->g5?"5G: +<br>":'';
    }
}