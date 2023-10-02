<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Farmácia</title>
</head>
<body>
<?php 
        include_once('classes/FarmaciaClass.php');
        
        session_start();

        // reset do server e da pagina
        // session_unset();
        // header('Location: cad-farm.php');

        $indexForm = true;
        
        if(!isset($_SESSION['farmacias'])) {
            $_SESSION['farmacias'] = array();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
            $campos = array('nome', 'endereco', 'email', 'cnpj');
            $camposPreenchidos = true;

            foreach ($campos as $campo) {
                if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                    $camposPreenchidos = false;
                    break;
                }
            }

            if($camposPreenchidos) {
                $newFarmacia = new Farmacia;

                $newFarmacia->setNome($_POST['nome']);
                $newFarmacia->setEndereco($_POST['endereco']);
                $newFarmacia->setEmail($_POST['email']);
                $newFarmacia->setCnpj($_POST['cnpj']);

                $newFarmacia->setPermissao("");

                $_SESSION['farmacias'][$_POST['cnpj']] = $newFarmacia;
            }
        }

        if(isset($_POST['vFarm'])) {
            foreach ($_SESSION['farmacias'] as $farm) {
                echo $farm->getNome();
            }
        }
    ?>

    <form action="cad-farm.php" method="post">
        <input type="submit" name="vFarm" value="ver farmacias">
    </form>
    <?php 
        if($indexForm) { ?>
            <form action="cad-farm.php" method="post">
                <table>
                    <td><div class="button-container">
                        <div class="column">
                            <h2>Cadastro de Farmacias</h2>
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="text" name="endereco" placeholder="Endereço">
                            <input type="text" name="email" placeholder="Email">
                            <input type="text" name="cnpj" placeholder="CNPJ">
                        </div>
                        <div class="third-column">
                            <input type="submit" name="cadButton" value="Cadastrar" class="menu-button">
                        </div>
                    </div></td>
                </table>
            </form>
        <?php }?>

    <a href="../html/index.html" class="menu-button2">Voltar</a>
</body>
</html>