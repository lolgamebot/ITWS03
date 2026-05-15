<?php

class Database
{
    public $conn;

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function Query($Query, $params = [])
    {
        try {
            $sth = $this->conn->prepare($Query);
            $sth->execute($params);

            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: {$e->getMessage()}");
        }
    }
}