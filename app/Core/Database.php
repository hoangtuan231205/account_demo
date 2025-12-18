<?php

class Database {
    private static $pdo = null;

    public static function pdo() {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $host = "127.0.0.1";
        $db   = "account";
        $user = "root";
        $pass = "";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        self::$pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        return self::$pdo;
    }
}
