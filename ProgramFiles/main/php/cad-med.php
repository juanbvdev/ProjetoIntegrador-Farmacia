<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de médico</title>
</head>
<body>
<?php 
        include_once('classes/MedicoClass.php');
        
        session_start();

        // reset do server e da pagina
        // session_unset();
        // header('Location: cad-med.php');

        $indexForm = true;
        
        if(!isset($_SESSION['medicos'])) {
            $_SESSION['medicos'] = array();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
            $campos = array('nome', 'cpf', 'idade', 'endereco', 'email', '');
            $camposPreenchidos = true;

            foreach ($campos as $campo) {
                if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                    $camposPreenchidos = false;
                    break;
                }
            }

            if($camposPreenchidos) {
                $newMedic = new Medico(
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

                $newMedic->setPrescricoes("");

                $_SESSION['medicos'][$_POST['cpf']] = $newMedic;
            }
        }

        if(isset($_POST['vMedic'])) {
            foreach ($_SESSION['medicos'] as $med) {
                echo $med->getNome();
            }
        }
    ?>

    <form action="cad-med.php" method="post">
        <input type="submit" name="vMedic" value="ver médicos">
    </form>
    
    <?php 
        if($indexForm) { ?>
            <form action="cad-med.php" method="post">
                <table>
                    <td><div class="button-container">
                        <div class="column">
                            <h2>Cadastro de Médico</h2>
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="text" name="cpf" placeholder="CPF">
                            <input type="text" name="idade" placeholder="Idade">
                            <input type="text" name="endereco" placeholder="Endereço">
                            <input type="text" name="email" placeholder="Email">
                            <input type="text" name="registro" placeholder="Registro">
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