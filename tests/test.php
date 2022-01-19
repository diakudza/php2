<?php
use PHPUnit\Framework\TestCase;
class Demo extends TestCase
{

    /**
     * @dataProvider  addd
     */

    public function testAdd($a,$b,$ex){
     $sum=$a+$b;
     $this->assertSame($ex,$sum);
   }

    public function addd(){
        return [
            [1,2,3],
            [4,2,6],
            [6,2,8],
        ];
    }
}