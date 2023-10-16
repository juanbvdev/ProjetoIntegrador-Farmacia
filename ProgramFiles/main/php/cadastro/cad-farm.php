<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Cadastro Farmacia</title>
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
require_once "../Dao/FarmaciaDAO.php";

$indexForm = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dadosUsuario = array(
        "nome" => $_POST["nome"],
        "cpf_cnpj" => $_POST["cnpj"],
        "idade" => 0,
        "endereco" => $_POST["endereco"],
        "email" => $_POST["email"],
        "permissao" => 4, 
        "senha" => $_POST["senha"]
    );

    $usuarioDAO = new UsuarioDAO($pdo);
    $idUsuario = $usuarioDAO->cadastro($dadosUsuario);
    
    $farmaciaDAO = new FarmaciaDAO($pdo);
    $farmaciaDAO->cadastro($idUsuario);

    header('Location: ../../html/index.html');
    exit;
}
?>

<?php if ($indexForm) { ?>
        <form action="" method="post">
            <table>
            <h1>Cadastro de Farmacias</h1>
            <td>
                <tr>
                    <td>
                        <h2>Nome</h2>
                    </td>
                    <td><input type="text" name="nome" placeholder="Informe o nome"></td>
                </tr>
                <tr>
                    <td>
                        <h2>Endereço</h2>
                    </td>
                    <td><input type="text" name="endereco" placeholder="Informe o endereço"></td>
                </tr>
                <tr>
                    <td>
                        <h2>Email</h2>
                    </td>
                    <td><input type="text" name="email" placeholder="Informe o email"></td>
                </tr>
                <tr>
                    <td>
                        <h2>CNPJ</h2>
                    </td>
                    <td><input type="text" name="cnpj" placeholder="Informe o CNPJ (Apenas números!!!)"></td>
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

    <script src="../../JavaScript/cpf.js"></script>
    <script src="../../JavaScript/email.js"></script>
    <script src="../../JavaScript/senha.js"></script>
    <script src="../../JavaScript/onsubmit.js"></script>
</body>

</html>