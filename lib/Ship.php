<?php


class Ship
{
    public $name;

    public $weaponPower = 0; // default value = 0

    public $jediFactor = 0;

    public $strength = 0;



    public function sayHello()
    {
        return 'Hello World!';
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Ship $someShip
     */
    public static function printShipSummary(Ship $someShip)
    {
        echo 'Ship name: ' . $someShip->name;
        echo '<hr>';
        echo $someShip->sayHello();
        echo '<hr>';
        echo $someShip->getNameAndSpecs(true);
        echo '<hr>';
        echo $someShip->getNameAndSpecs(false);
        echo '<hr>';
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        if ( $useShortFormat ) {
            printf( '%s: %s/%s/%s ' ,
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        } else {
            printf( '%s: w:%s j:%s s:%s ' ,
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return ( $givenShip->strength > $this->strength );
    }
}




