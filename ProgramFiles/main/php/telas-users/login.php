<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Login</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../css/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ed891ee09d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</head>

<header>
    <?php include '../../html/header.html'; ?>
</header>

<body>
    
    
<?php
require_once "../../config/database.php";
require_once "../classes/UserClass.php";
require_once "../Dao/UsuarioDAO.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logButton"])) {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    $usuarioDAO = new UsuarioDAO($pdo);  

    autenticarUsuario($nome, $cpf, $usuarioDAO);
}

function autenticarUsuario($nome, $cpf, $usuarioDAO) {
    $usuario = $usuarioDAO->buscarPorNomeECpf($nome, $cpf);

    if ($usuario) {
        $permissao = $usuario['permissao'];

        if ($permissao == 1) {
            header('Location: ../telas-users/screen-clie.php?id=' . $usuario['id']);
            session_start();
            $_SESSION['username'] = $nome;
            $_SESSION['password'] = $cpf;
             exit();
        } elseif ($permissao == 2) {
            header('Location: ../telas-users/screen-med.php?id=' . $usuario['id']);
            session_start();
            $_SESSION['username'] = $nome;
            $_SESSION['password'] = $cpf;
            exit();
        } elseif ($permissao == 3) {
            echo 'Funcionário logado'; 
        } elseif ($permissao == 4) {
            header('Location: ../telas-users/screen-farm.php?id=' . $usuario['id']);
            session_start();
            $_SESSION['username'] = $nome;
            $_SESSION['password'] = $cpf;
            exit();
        }
    } else {
        echo 'Usuário não encontrado. Tente novamente.';
    }
}
?>
    <form action="" method="post">
        <table>
           <p> <h1>Login</h1></p>
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
                <td><input type="text" name="cpf" id="CPF" placeholder="Informe seu CPF (Apenas números!!!)" oninput="atualizarCampoCPF(); validarCPF(); limparAvisoCPF();">
                            <div id="cpfWarning" style="color: red;"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Senha</h2>
                </td>
                <td><input type="password" name="senha" placeholder="Informe sua Senha"></td>
            </tr>
        </table>
        <input type="submit" name="logButton" value="Login" class="account-button2">
    </form>
    <a href="../../php/cadastro/cadastro.php" class="menu-button2">Voltar</a>
    <script src="../../JavaScript/cpf.js"></script>
</body>

</html>