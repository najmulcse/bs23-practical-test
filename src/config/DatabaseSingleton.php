<?php

namespace Najmul\Ecom\config;

class DatabaseSingleton {

    private static $instance;
    private $db;

    private function __construct() {
        $this->db = new Database("localhost", "root", "12345678", "ecomerce");
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