<?php  


$host = 'localhost';
$db = 'site_palestras';
$user = 'root';
$pass = 'Derikadr156';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Conexão falhou: ' . $e->getMessage();
    }
}
