<?php

class Digit extends Good //цифровой
{
    protected $count;
    protected $price;

    public function __construct($title = 'empty', $description = 'empty', $weight = 1, $count = 1)
    {
        parent::__construct($title, $description, $weight, $count);
        self::setPrice();
    }

    public function setPrice(): void
    {
        $new= new Piece();
        $this->price = $new->getPrice()/2;
    }

    function finalSum()
    {
        return $this->price * $this->count;
    }

    function view()
    {
        echo parent::view()."<br>count: {$this->count}<br> Final sum: ".self::finalSum()."<hr>";
    }
}