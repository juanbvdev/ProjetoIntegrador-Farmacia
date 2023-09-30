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
        session_start();
        include_once('classes/ClienteClass.php');

        $indexForm = true;
        
        if(!isset($_SESSION['clientes'])) {
            $_SESSION['clientes'] = array();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadButton'])) {
            $campos = array('nome', 'cpf', 'idade', 'endereco', 'email');
            $camposPreenchidos = true;

            foreach ($campos as $campo) {
                if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                    $camposPreenchidos = false;
                    break;
                }
            }

            if($camposPreenchidos) {
                $newClient = new Cliente;

                $newClient->setNome($_POST['nome']);
                $newClient->setCpf($_POST['cpf']);
                $newClient->setIdade($_POST['idade']);
                $newClient->setEndereco($_POST['endereco']);
                $newClient->setEmail($_POST['email']);

                $newClient->setPermissao("");
                $newClient->setCartoes("");
                $newClient->setCompras("");
                $newClient->setReceitas("");

                $_SESSION['clientes'][$_POST['cpf']] = $newClient;
            }
        }
    ?>

    <?php 
        if($indexForm) {
            echo '
            <form action="cad-clie.php" method="post">
                <table>
                    <td><div class="button-container">
                        
                        <div class="column">
                            <h2>Cadastro de Cliente</h2>
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="text" name="cpf" placeholder="CPF">
                            <input type="text" name="idade" placeholder="Idade">
                            <input type="text" name="endereco" placeholder="Endereço">
                            <input type="text" name="email" placeholder="email">    
                        </div>
                        <div class="third-column">
                            <input type="submit" name="cadButton" value="Cadastrar" class="menu-button">
                        </div>
                    </div></td>
                </table>
            </form>
            ';
        }
    ?>
    
    <a href="../html/index.html" class="menu-button2">Voltar</a>
</body>
</html>