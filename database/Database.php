<?php
class Database {
    private $config;
    private $pdo;

    public function __construct() {
        $config = require 'config.php';
        $this->config = $config;
    }

    public function getConnection(): PDO {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO(
                    "mysql:host={$this->config['host']}:{$this->config['port']};dbname={$this->config['dbname']};charset=utf8", 
                    $this->config['username'], 
                    $this->config['password']
                );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
