<?php

$servername = "localhost";
$database = "projeto-farmacia";
$username = "root";
$password = "";

$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

if ($pdo) {
    echo "Conexão ao banco de dados bem-sucedida!";
} else {
    echo "Erro ao conectar ao banco de dados!";
}
