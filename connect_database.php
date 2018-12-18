<?php
require_once 'config.php';

$db;
try {
    $db = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.
        ';dbname='.DB_NAME.';charset='.DB_CHARSET, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Ошибка: Невозможно установить соединение. ". $e->getMessage() . "\n";
    exit;
}
?>