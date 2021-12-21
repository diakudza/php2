<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
//1234 - на уроке разбирали, статичное связывание переменной с классом
echo "<br>";

class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B1 extends A1 {
}
$a1 = new A1();
$b1 = new B1();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

//1122- тут у нас класс B1 наследовался от A1 и по-этому каждый вызов в
//каждом экземпляре класса будет тикать свою переменную.
//-----------------------------



