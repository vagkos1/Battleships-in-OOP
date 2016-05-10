<?php

interface ShipStorageInterFace
{
    /**
     * Returns an array of ships, with keys, id, name, weaponPower, defense.
     *
     * @return array
     */
    public function fetchAllShipsData();

    /**
     * @param integer $id
     * @return array
     */
    public function fetchSingleShipData($id);
}