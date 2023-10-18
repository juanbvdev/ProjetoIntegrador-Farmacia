<?php

function userexistente($cpf, $email)
{

    $servername = "localhost";
    $database = "projeto-farmacia";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE cpf_cnpj = '$cpf' OR email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}
