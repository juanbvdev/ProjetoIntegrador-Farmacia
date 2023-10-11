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
    include_once('../classes/MedicoClass.php');

    session_start();

    // reset do server e da pagina
    // session_unset();
    // header('Location: cad-med.php');

    $indexForm = true;

    if (!isset($_SESSION['medicos'])) {
        $_SESSION['medicos'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
        $campos = array('nome', 'cpf', 'idade', 'endereco', 'email', 'registro', 'senha');
        $camposPreenchidos = true;

        foreach ($campos as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                $camposPreenchidos = false;
                break;
            }
        }

        if ($camposPreenchidos) {
            $newMedic = new Medico(
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
            $_SESSION['medicos'][$_POST['cpf']] = $newMedic;
        }
    }

    if (isset($_POST['vMedic'])) {
        foreach ($_SESSION['medicos'] as $med) {
            echo $med->getNome();
        }
    }
    ?>

    <form action="cad-med.php" method="post">
        <input type="submit" name="vMedic" value="ver médicos">
    </form>

    <?php
    if ($indexForm) { ?>
        <form action="cad-med.php" method="post">
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