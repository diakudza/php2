<?php

class File 
{
    private $name;
    private $tmpname;
    private $size;
    
    public function __construct($array)
       {	
			
            $this->name=$array['img']['name'];
			$this->tmpname=$array['img']['tmp_name'];
            $this->size=$array['img']['size'];
       } 
    
    function getName() 
    {	
		
        return $this->name;
    }   

    function getTmpname() 
    {
        return $this->tmpname;
    }   

    function getSize() 
    {
        return $this->size;
    }   
}
