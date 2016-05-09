<?php

class RebelShip extends AbstractShip
{
    public function getFavoriteJedi()
    {
        $coolJedis = array('Yoda', 'Ben Kenobi');
        $key = array_rand($coolJedis);  // array_rand() randomly returns a key from the $coolJedis array

        return $coolJedis[$key];
    }

    public function getType()
    {
        return 'Rebel';
    }

    //fully override parent's function
    public function isFunctional()
    {
        return true;
    }

    // expand on parent's method'
    public function getNameAndSpecs($useShortFormat = false)
    {
        $val = parent::getNameAndSpecs($useShortFormat);
        $val .= ' (Rebel)';

        return $val;
    }

    // override parents method
    public function getJediFactor()
    {
        return rand(10, 30);
    }
}