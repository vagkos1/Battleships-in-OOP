<?php

require_once __DIR__ . "/lib/ship.php";

/**
 * @return array
 */
function get_ships() {

    $ships = array();

    $ship = new Ship();
    $ship->setName('Jedi StarFighter');
    $ship->setWeaponPower(5);
    $ship->setJediFactor(15);
    $ship->setStrength(30);
    $ships['starFighter'] = $ship;   // push our first ship into ships()

    $ship2 = new Ship();
    $ship2->setName('CloakShape Fighter');
    $ship2->setWeaponPower(2);
    $ship2->setJediFactor(2);
    $ship2->setStrength(70);
    $ships['CloakShape Fighter'] = $ship2;

    $ship3 = new Ship();
    $ship3->setName('Super Star Destroyer');
    $ship3->setWeaponPower(70);
    $ship3->setJediFactor(0);
    $ship3->setStrength(500);
    $ships['Super Star Destroyer'] = $ship3;

    $ship4 = new Ship();
    $ship4->setName('RZ-1 A-wing interceptor');
    $ship4->setWeaponPower(4);
    $ship4->setJediFactor(4);
    $ship4->setStrength(50);
    $ships['RZ-1 A-wing interceptor'] = $ship4;

    return $ships;
}