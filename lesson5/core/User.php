<?php


class User
{
    private $login = 'guest';
    private static
        $instance = null;


    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __construct() {}
    public function test()
    {
        var_dump($this);
    }


}