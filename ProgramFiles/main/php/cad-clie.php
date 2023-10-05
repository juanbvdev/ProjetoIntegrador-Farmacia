<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Cadastro de Cliente</title>
</head>

<body>
    <?php
    session_start();
    include_once('classes/ClienteClass.php');
    include_once('classes/UserClass.php');

    $indexForm = true;

    if (!isset($_SESSION['clientes'])) {
        $_SESSION['clientes'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
        $campos = array('nome', 'cpf', 'idade', 'endereco', 'email', 'senha');
        $camposPreenchidos = true;

        foreach ($campos as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                $camposPreenchidos = false;
                break;
            }
        }

        if ($camposPreenchidos) {
            $newClient = new Cliente(
                0,
                "",
                "",
                $_POST['nome'],
                $_POST['cpf'],
                $_POST['idade'],
                $_POST['endereco'],
                $_POST['email'],
                0,
                $_POST['senha']
            );

            $_SESSION['clientes'][$_POST['cpf']] = $newClient;

            header('Location: ../html/index.html');
            exit;
        }
    }
    ?>

    <?php if ($indexForm) { ?>
        <form action="cad-clie.php" method="post">
            <table>
                <h1>Cadastro de Cliente</h1>
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
                        <td><input type="text" name="idade" placeholder="Informe sua Idade"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Endereço</h2>
                        </td>
                        <td><input type="text" name="endereco" placeholder="Informe seu Endereço"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Email</h2>
                        </td>
                        <td><input type="text" name="email" placeholder="Informe seu Email"></td>
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

    <a href="../html/index.html" class="menu-button2">Voltar</a>
</body>

</html>