<?php


class ShipLoader
{
    /**
     * @return array
     */
    public function getShips() {

        $ships = array();

        $ship = new Ship('Jedi StarFighter');  // makes sense to put the name in the constructor in order
        $ship->setWeaponPower(5);
        $ship->setJediFactor(15);
        $ship->setStrength(30);
        $ships['starFighter'] = $ship;
        // push our first ship into ships()
        // it will be in the format of
        // 'starFighter' => Ship object ( [name:Ship:private] => Jedi StarFighter [weaponPower:Ship:private] => 5 [jediFactor:Ship:private] => 15 [strength:Ship:private] => 30 [underRepair:Ship:private] => 1 )
        // which means that in order to access it later on we will simply have to do $ships[ship1_name] as the name is unique for each type of ship

        $ship2 = new Ship('CloakShape Fighter');
        $ship2->setWeaponPower(2);
        $ship2->setJediFactor(2);
        $ship2->setStrength(70);
        $ships['CloakShape Fighter'] = $ship2;

        $ship3 = new Ship('Super Star Destroyer');
        $ship3->setWeaponPower(70);
        $ship3->setJediFactor(0);
        $ship3->setStrength(500);
        $ships['Super Star Destroyer'] = $ship3;

        $ship4 = new Ship('RZ-1 A-wing interceptor');
        $ship4->setWeaponPower(4);
        $ship4->setJediFactor(4);
        $ship4->setStrength(50);
        $ships['RZ-1 A-wing interceptor'] = $ship4;

        return $ships;
    }
}