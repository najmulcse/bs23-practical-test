<?php

namespace Najmul\Ecom\config;

class DatabaseSingleton {
    private static $instance;
    private $db;

    private function __construct() {
        $config = require_once('config.php');
        $dbConfig = $config['database'];
        $this->db = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);
        $this->db->connect();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseSingleton();
        }
        return self::$instance;
    }

    public function getDatabase() {
        return $this->db;
    }

}