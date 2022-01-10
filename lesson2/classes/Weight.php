<?php

class Weight extends Good //весовой

{
    use Ttraits;
    protected $price ;
    protected $weight=1;

    public function __construct($title = 'empty', $description = 'empty', $weight = 1, $count = 1)
    {
        parent::__construct($title, $description, $weight, $count);
        self::setPrice();
    }

    function finalSum()
    {
        return $this->price * $this->weight;
    }

    public function setPrice(): void
    {
        $new= new Piece();
        $this->price = $new->getPrice();
    }

    function view()
    {
        echo parent::view()."<br>weight: {$this->weight} кг <br> Final sum: ".self::finalSum()."<hr>";
    }
}
