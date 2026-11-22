<?php
$host = 'localhost'; $dbname = 'gerenciador_logistico'; $user = 'root'; $pass = '';
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
} catch (PDOException $e) {
  die('Não foi possível conectar ao banco de dados. Confira se o MySQL do XAMPP está ativo e importe database.sql.');
}
