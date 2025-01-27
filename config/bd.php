<?php
$ruta_vendor = __DIR__ . '/../vendor/autoload.php';
require $ruta_vendor;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$rutaServidor = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$nombreBaseDeDatos = $_ENV['DB_NAME_LOCAL'];

try {
    $conn_bd = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos;Encrypt=false;TrustServerCertificate=false", $user, $pass);
    $conn_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error de conexión: " . $e->getMessage());
}