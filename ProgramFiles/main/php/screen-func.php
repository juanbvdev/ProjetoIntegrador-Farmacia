<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funcionario</title>
</head>
<body>
    <?php 
        include_once('classes/FuncionarioClass.php');
        include_once('classes/UserClass.php');
        
        session_start();

        $cpf = $_SESSION['logInfo'][0];

        $funcionario = $_SESSION['funcionarios'][$cpf];

        echo $funcionario->getNome();
    ?>

    <p>
        <a href="../html/index.html" class="menu-button2">Voltar</a>
    </p>
</body>
</html>