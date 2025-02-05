<?php

namespace App\Config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

require __DIR__.'/../../vendor/autoload.php'; // Composer autoloader

// Load .env file from the root of your project
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Connection {
    private static ?PDO $conn = null; // Static property for Singleton pattern

    public static function getConnection(): ?PDO {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    "pgsql:host={$_ENV['DB_SERVER']};dbname={$_ENV['DB_NAME']}",
                    $_ENV['DB_USERNAME'],
                    $_ENV['DB_PASSWORD'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable error reporting
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch results as associative arrays
                        PDO::ATTR_EMULATE_PREPARES => false // Use real prepared statements
                    ]
                );
            } catch (PDOException $exception) {
                die("Database Connection Error: " . $exception->getMessage());
            }
        }
        return self::$conn;
    }
}
