<?php


class ShipLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return AbstractShip[]
     */
    public function getShips() {
        $shipsData = $this->queryForShips();

        $ships = array();
        foreach($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT id, name, weapon_power, jedi_factor, strength, team FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $shipsArray;
    }

    /**
     * @param $id
     * @return null|AbstractShip
     */
    public function findOneShipById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT id, name, weapon_power, jedi_factor, strength, team
                                    FROM ship WHERE id = :id');
        $statement->execute( array('id' => $id) );
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if ( !$shipArray ) {
            return null;
        }
        
        return $this->createShipFromData($shipArray);
    }

    /**
     * @param array $shipData
     * @return AbstractShip
     * @throws Exception
     */
    private function createShipFromData(array $shipData)
    {
        if ( $shipData['team'] == 'rebel' ) {
            $ship = new RebelShip($shipData['name']);
        } else {
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }

        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }
}