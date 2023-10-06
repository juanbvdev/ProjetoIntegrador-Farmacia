<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Medico</title>
</head>
<body>
    <?php 
        include_once('classes/MedicoClass.php');
        include_once('classes/UserClass.php');
        
        session_start();

        $cpf = $_SESSION['logInfo'][0];

        $med = $_SESSION['medicos'][$cpf];

        echo $med->getNome();
    ?>

    <p>
        <a href="../html/index.html" class="menu-button2">Voltar</a>
    </p>
</body>
</html>