<?php

require_once __DIR__ . "/lib/ship.php";

/**
 * @return array
 */
function get_ships() {

    $ships = array();

    $ship = new Ship();
    $ship->name = 'Jedi StarFighter';
    $ship->weaponPower = 5;
    $ship->jediFactor = 15;
    $ship->strength = 30;

    $ships['starFighter'] = $ship;   // push our first ship into ships()

    return $ships;
}