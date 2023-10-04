<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <?php
    include_once('classes/UserClass.php');
    include_once('classes/MedicoClass.php');
    include_once('classes/FuncionarioClass.php');
    include_once('classes/ClienteClass.php');

    session_start();

        $indexForm = true;

        if(!isset($_SESSION['logInfo'])) {
            $_SESSION['logInfo'] = array();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logButton'])) {
            $nome && $_SESSION['logInfo'][0] = $_POST['nome'];
            $cpf && $_SESSION['logInfo'][1] = $_POST['cpf'];
            
            if(findMedic($nome, $cpf)) {
                echo 'medico logado';
            }
            if(findClient($nome, $cpf)) {
                echo 'cliente logado';
            }
            if(findFuncionario($nome, $cpf)) {
                echo 'funcionario logado';
            }
        }
    ?>

    <?php 
        function findMedic(string $nome, string $cpf) : bool {

        if (isset($_SESSION['medicos'])) {
            foreach ($_SESSION['medicos'] as $med) {
                if ($nome == $med->getNome() && $cpf == $med->getCpfCnpj()) {
                    return true;
                }
            }
        }

        return false;
    }

    function findClient(string $nome, string $cpf): bool
    {

        if (isset($_SESSION['clientes'])) {
            foreach ($_SESSION['clientes'] as $client) {
                if ($nome == $client->getNome() && $cpf == $client->getCpfCnpj()) {
                    return true;
                }
            }
        }

        return false;
    }

    function findFuncionario(string $nome, string $cpf): bool
    {

        if (isset($_SESSION['funcionarios'])) {
            foreach ($_SESSION['funcionarios'] as $funcionario) {
                if ($nome == $funcionario->getNome() && $cpf == $funcionario->getCpfCnpj()) {
                    return true;
                }
            }
        }

        return false;
    }
    ?>

    <?php
    if ($indexForm) { ?>
        <form action="login.php" method="post">
            <table>
                <h1>Login</h1>
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
                            <h2>Senha</h2>
                        </td>
                        <td><input type="password" name="senha" placeholder="Informe sua Senha"></td>
                    </tr>

                </td>
            </table>
            <input type="submit" name="logButton" value="Login" class="account-button2">
        </form>
    <?php } ?>
    <a href="../html/index.html" class="menu-button2">Voltar</a>
</body>

</html>