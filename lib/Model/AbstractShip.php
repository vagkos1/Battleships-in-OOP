<?php


abstract class AbstractShip
{
    private $id;

    private $name;

    private $weaponPower = 0; // default value = 0

    private $strength = 0;

    abstract public function getJediFactor();

    abstract public function getType();

    abstract public function isFunctional();

    public function __construct($name)
    {
        $this->name = $name;
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
        if ($useShortFormat) {
            printf('%s: %s/%s/%s ',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );
        } else {
            printf('%s: w:%s j:%s s:%s ',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
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
        return ($givenShip->strength > $this->strength);
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
        if (!is_numeric($strength)) {
            throw new Exception('Invalid strength passed: ' . $strength);
        }
        $this->strength = $strength;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}