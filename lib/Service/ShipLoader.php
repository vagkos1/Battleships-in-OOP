<?php


class ShipLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Ship[]
     */
    public function getShips() {
        $shipsData = $this->queryForShips();

        $ships = array();
        foreach($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    /**
     * @return array
     */
    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT id, name, weapon_power, jedi_factor, strength, is_under_repair FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $shipsArray;
    }

    /**
     * @param $id
     * @return null|Ship
     */
    public function findOneShipById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT id, name, weapon_power, jedi_factor, strength, is_under_repair
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
     * @return Ship
     * @throws Exception
     */
    private function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
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