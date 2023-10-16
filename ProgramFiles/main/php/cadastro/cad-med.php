<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Cadastro Médico</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../css/favicon.ico" type="image/x-icon">
</head>

<header>
<?php include '../../html/header.html'; ?>
</header>

<body>
<?php
require_once "../../config/database.php";
require_once "../Dao/UsuarioDAO.php";
require_once "../Dao/MedicoDAO.php";

$indexForm = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dadosUsuario = array(
        "nome" => $_POST["nome"],
        "cpf_cnpj" => $_POST["cpf"],
        "idade" => $_POST["idade"],
        "endereco" => $_POST["endereco"],
        "email" => $_POST["email"],
        "permissao" => 2, 
        "senha" => $_POST["senha"]
    );

    $usuarioDAO = new UsuarioDAO($pdo);
    $idUsuario = $usuarioDAO->cadastro($dadosUsuario);

    // $dadosMedico = array(
    //     "registro" => $_POST["registro"],
    //     "prescricoes" => $_POST["prescricoes"],
    //     "idusuario" => $idUsuario
    // );

    // $medicoDAO = new MedicoDAO($pdo);
    // $idMedico = $medicoDAO->cadastro($dadosMedico);

    header('Location: ../../html/index.html');
    exit;
}
?>


    <?php
    if ($indexForm) { ?>
        <form action="" method="post">
            <table>
                <h1>Cadastro de Médico</h1>
                <td>
                    <tr>
                        <td>
                            <h2>Nome</h2>
                        </td>
                        <td><input type="text" name="nome" placeholder="Informe seu nome"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>CPF</h2>
                        </td>
                        <td><input type="text" name="cpf" placeholder="Informe seu CPF (Apenas números!!!)"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Idade</h2>
                        </td>
                        <td><input type="text" name="idade" placeholder="Informe sua idade"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Endereço</h2>
                        </td>
                        <td><input type="text" name="endereco" placeholder="Informe seu endereço"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Email</h2>
                        </td>
                        <td><input type="text" name="email" placeholder="Informe seu email"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Registro</h2>
                        </td>
                        <td><input type="text" name="registro" placeholder="Informe seu registro"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Senha</h2>
                        </td>
                        <td><input type="password" name="senha" placeholder="Crie uma senha"></td>
                    </tr>
                </td>
            </table>
            <input type="submit" name="cadButton" value="Cadastrar" class="account-button2">
        </form>

    <?php } ?>

    <a href="../cadastro/cadastro.php" class="menu-button2">Voltar</a>
</body>

</html>