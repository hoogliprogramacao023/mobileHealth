<?php 
$hostname_conexao = "localhost";
$database_conexao = "hoog1698_mobile_health";
$username_conexao = "hoog1698_hoogli";
$password_conexao = "Hoogli@2002";

global $conn;

try {
    $conn = new PDO("mysql:host=$hostname_conexao;dbname=$database_conexao", $username_conexao, $password_conexao);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}
?>