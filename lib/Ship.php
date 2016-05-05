<?php


class Ship
{
    private $name;

    private $weaponPower = 0; // default value = 0

    private $jediFactor = 0;

    private $strength = 0;

    private $underRepair;

    public function __construct($name)
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 100) < 30;  // 30% chance of being broken
    }

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    public function sayHello()
    {
        return 'Hello World!';
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

    /**
     * @param $givenShip
     * @return bool
     */
    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return ( $givenShip->strength > $this->strength );
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    /**
     * @return int
     */
    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    /**
     * @param int $jediFactor
     */
    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param $strength
     * @throws Exception
     */
    public function setStrength($strength)
    {
        if ( !is_numeric($strength) ) {
            throw new Exception('Invalid strength passed: ' . $strength);
        }
        $this->strength = $strength;
    }
}




