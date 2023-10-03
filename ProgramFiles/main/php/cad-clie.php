<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Cliente</title>
</head>

<body>
    <?php
    include_once('classes/ClienteClass.php');
    include_once('classes/UserClass.php');
    
    session_start();
    
    // session_unset();
    // header('Location: cad-clie.php');

    $indexForm = true;

    if (!isset($_SESSION['clientes'])) {
        $_SESSION['clientes'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
        $campos = array('nome', 'cpf', 'idade', 'endereco', 'email');
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
                0
            );

            $_SESSION['clientes'][$_POST['cpf']] = $newClient;
        }
    }
    ?>

    <?php if ($indexForm) { ?>
        <form action="cad-clie.php" method="post">
            <table>
                <h2>Cadastro de Cliente</h2>
                <td>
                    <tr>
                        <td>
                            <h2>Nome</h2>
                        </td>
                        <td><input type="text" name="nome" placeholder="Nome"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>CPF</h2>
                        </td>
                        <td><input type="text" name="cpf" placeholder="CPF"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Idade</h2>
                        </td>
                        <td><input type="text" name="idade" placeholder="Idade"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Endereço</h2>
                        </td>
                        <td><input type="text" name="endereco" placeholder="Endereço"></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Email</h2>
                        </td>
                        <td><input type="text" name="email" placeholder="Email"></td>
                    </tr>
                    <div class="button-container">
                <th><input type="submit" name="cadButton" value="Cadastrar" class="menu-button"></th>
                </div>
                </td>
            </table>
        </form>
    <?php } ?>

    <a href="../html/index.html" class="menu-button2">Voltar</a>
</body>

</html>