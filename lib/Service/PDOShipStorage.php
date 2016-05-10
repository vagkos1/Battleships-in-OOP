<?php

class PDOShipStorage implements ShipStorageInterFace
{
    private $pdo;

    public function __construct(PDO $pdo )
    {
        $this->pdo = $pdo;
    }

    public function fetchAllShipsData()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT id, name, weapon_power, jedi_factor, strength, team FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $shipsArray;
    }

    public function fetchSingleShipData($id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT id, name, weapon_power, jedi_factor, strength, team
                                    FROM ship WHERE id = :id');
        $statement->execute( array('id' => $id) );
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if ( !$shipArray ) {
            return null;
        }

        return $shipArray;
    }
}