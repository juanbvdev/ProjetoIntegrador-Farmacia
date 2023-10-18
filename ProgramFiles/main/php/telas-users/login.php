<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Login</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../css/favicon.ico" type="image/x-icon">
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
            exit();
        } elseif ($permissao == 3) {
            echo 'Funcionário logado'; 
        } elseif ($permissao == 4) {
            header('Location: ../telas-users/screen-farm.php?id=' . $usuario['id']);
            exit();
        }
    } else {
        echo 'Usuário não encontrado. Tente novamente.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Login</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../css/favicon.ico" type="image/x-icon">
</head>

<body>
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