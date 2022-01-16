<?php

class Piece extends Good //штучный
{
    protected $price = 100;
    protected $count;

    function finalSum()
    {
      return $this->price * $this->count;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }
    function view()
    {
        echo parent::view()."<br>count: {$this->count}<br> Final sum: ".self::finalSum();
    }
}