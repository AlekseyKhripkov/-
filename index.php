<?php

abstract class Animal
{
    static $id = 1;
    public $idAnimal;

    public abstract function getProduct();

    public function getClass()
    {
        return static::class;
    }
}

class Cow extends Animal
{
    function __construct()
    {
        $this->idAnimal=parent::$id++;
    }

    public function getProduct()
    {
        return rand(8 , 12);
    }
}

class Chicken extends Animal
{
    function __construct()
    {
        $this->idAnimal=parent::$id++;
    }

    public function getProduct()
    {
        return rand(0 , 1);
    }
}

class CreateFactory
{
    public function getCow()
    {
        return new Cow();
    }

    public function getChicken()
    {
        return new Chicken();
    }
}

$factory = new createFactory();
$arr = [];
for ($i = 0 ; $i < 7 ; $i++)
{
    $arr[] = $factory->getCow();
}
for ($y = 0; $y < 15 ; $y++)
{
    $arr[] = $factory->getChicken();
}

$milk = 0;
$egg = 0;
foreach ($arr as $value)
{
    switch ($value->getClass())
    {
        case("Cow"):
            $milk += $value->getProduct();
            break;
        case ("Chicken"):
            $egg += $value->getProduct();

    }
}

echo "Количество яиц - " . $egg . " штук" . "\n" . "Количество молока - " . $milk . " литров.";



