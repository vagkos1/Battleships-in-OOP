<?php

class BattleManager
{
    /**
     * The battling logic of our application!
     *
     * @param AbstractShip $ship1
     * @param $ship1Quantity
     * @param AbstractShip $ship2
     * @param $ship2Quantity
     * @return BattleResult
     */
    public function battle( AbstractShip $ship1, $ship1Quantity, AbstractShip $ship2, $ship2Quantity)
    {
        $ship1Health = $ship1->getStrength() * $ship1Quantity;
        $ship2Health = $ship2->getStrength() * $ship2Quantity;

        $ship1UsedJediPowers = false;
        $ship2UsedJediPowers = false;
        while ($ship1Health > 0 && $ship2Health > 0) {
            // first, see if we have a rare Jedi hero event!
            if ($this->didJediDestroyShipUsingTheForce($ship1)) {
                $ship2Health = 0;
                $ship1UsedJediPowers = true;

                break;
            }
            if ($this->didJediDestroyShipUsingTheForce($ship2)) {
                $ship1Health = 0;
                $ship2UsedJediPowers = true;

                break;
            }

            // now battle them normally
            $ship1Health = $ship1Health - ($ship2->getWeaponPower() * $ship2Quantity);
            $ship2Health = $ship2Health - ($ship1->getWeaponPower() * $ship1Quantity);
        }

        // update the remainder of the strength for each ship after the battle is done
        $ship1->setStrength($ship1Health);
        $ship2->setStrength($ship2Health);

        if ($ship1Health <= 0 && $ship2Health <= 0) {
            // they destroyed each other - it's a tie!
            $winningShip = null;
            $losingShip = null;
            $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
        } elseif ($ship1Health <= 0) {
            $winningShip = $ship2;
            $losingShip = $ship1;
            $usedJediPowers = $ship2UsedJediPowers;
        } else {
            $winningShip = $ship1;
            $losingShip = $ship2;
            $usedJediPowers = $ship1UsedJediPowers;
        }

        return new BattleResult($usedJediPowers, $winningShip, $losingShip);
    }

    /**
     * @param AbstractShip $ship
     * @return bool
     */
    private function didJediDestroyShipUsingTheForce( AbstractShip $ship)
    {
        $jediHeroProbability = $ship->getJediFactor() / 100;

        return mt_rand(1, 100) <= ($jediHeroProbability*100);
    }
}