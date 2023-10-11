<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Cadastro Farmacia</title>
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
    include_once('classes/FarmaciaClass.php');
    include_once('classes/UserClass.php');

    session_start();

    // reset do server e da pagina
    // session_unset();
    // header('Location: cad-farm.php');

    $indexForm = true;

    if (!isset($_SESSION['farmacias'])) {
        $_SESSION['farmacias'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
        $campos = array('nome', 'endereco', 'email', 'cnpj', 'senha');
        $camposPreenchidos = true;

        foreach ($campos as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                $camposPreenchidos = false;
                break;
            }
        }

        if ($camposPreenchidos) {
            $newFarmacia = new Farmacia(
                0,
                $_POST['nome'],
                $_POST['cnpj'],
                0,
                $_POST['endereco'],
                $_POST['email'],
                0,
                $_POST['senha']
            );

            $_SESSION['farmacias'][$_POST['cnpj']] = $newFarmacia;
        }
    }

    if (isset($_POST['vFarm'])) {
        foreach ($_SESSION['farmacias'] as $farm) {
            echo $farm->getNome();
        }
    }
    ?>

    <form action="cad-farm.php" method="post">
        <input type="submit" name="vFarm" value="ver farmacias">
    </form>
    <?php
    if ($indexForm) { ?>
    <form action="cad-farm.php" method="post">
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

    <a href="../php/cadastro.php" class="menu-button2">Voltar</a>
</body>

</html>