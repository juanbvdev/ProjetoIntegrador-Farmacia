<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FPB - Cadastro Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../css/favicon.ico" type="image/x-icon">
</head>

<header>
    <div class="header-rectangle">
        <ul class="navigation">
            <li class="left-image"><a href="../html/index.html"><img src="../css/1.png" alt="Imagem 1"></a></li>

            <li class="center-image"><a href="../html/index.html"><img src="../css/2.png" alt="Imagem 2"></a></li>

            <li class="right-image"><a href="../php/cadastro.php"><img src="../css/3.png" alt="Imagem 3"></a></li>
        </ul>
    </div>
</header>

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
<script src="../JavaScript/cpf.js"></script>
    <?php if ($indexForm) { ?>
        <form action="cad-clie.php" method="post" onsubmit="return  onSubmitForm(); validarCPF(document.getElementById('cpf').value);">
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
                        <td><input type="text" name="cpf" id="CPF" placeholder="Informe seu CPF (Apenas números!!!)" 
                            oninput="atualizarCampoCPF(); validarCPF(); limparAvisoCPF();"></td>
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

    <a href="../php/cadastro.php" class="menu-button2">Voltar</a>
</body>

</html>