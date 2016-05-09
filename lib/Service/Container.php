<?php

class Container {

    private $config;

    private $pdo;

    private $shipLoader;

    private $battleManager;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * singleton style
     * @return PDO
     */
    public function getPDO()
    {
        if ( $this->pdo === null ) {
            $this->pdo = new PDO(
                $this->config['db_dsn'],
                $this->config['db_user'],
                $this->config['db_password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    /**
     * @return ShipLoader
     */
    public function getShipLoader()
    {
        if ( $this->shipLoader === null ) {
            $this->shipLoader = new ShipLoader($this->getPDO());
        }

        return $this->shipLoader;
    }

    /**
     * @return BattleManager
     */
    public function getBattleManager()
    {
        if ( $this->battleManager === null ) {
            $this->battleManager = new BattleManager();
        }

        return $this->battleManager;
    }
}