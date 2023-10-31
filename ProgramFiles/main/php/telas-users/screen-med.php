<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPB - Medico</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../css/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ed891ee09d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<header>
    <?php include '../../html/header.html'; ?>
</header>

<body>
    <?php
    require_once "../../config/database.php";
    require_once "../classes/UserClass.php";
    require_once "../Dao/UsuarioDAO.php";
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $usuarioDAO = new UsuarioDAO($pdo);
        $usuario = $usuarioDAO->buscarPorNomeECpf($username, $password);

        $dadosUsuario = array(
            'id' => $usuario['id'],
            'modalnome' => $usuario['nome'],
            'cpf' => $usuario['cpf_cnpj'],
            'idade' => $usuario['idade'],
            'endereco' => $usuario['endereco'],
            'email' => $usuario['email']
        );
    }
    ?>
    <td>
        <p>
        <h1>Medico</h1>
        </p>
    </td>
    <table>
        <td>
            <tr>
                <td>
                    <h2>Nome</h2>
                </td>
                <td><?php echo "$dadosUsuario[modalnome]" ?> </td>
            </tr>
            <tr>
                <td>
                    <h2>CPF</h2>
                </td>
                <td><?php echo "$dadosUsuario[cpf]" ?> </td>
            </tr>
            <tr>
                <td>
                    <h2>Idade</h2>
                </td>
                <td><?php echo "$dadosUsuario[idade]" ?> </td>
            </tr>
            <tr>
                <td>
                    <h2>Endereço</h2>
                </td>
                <td><?php echo "$dadosUsuario[endereco]" ?> </td>
            </tr>
            <tr>
                <td>
                    <h2>Email</h2>
                </td>
                <td><?php echo "$dadosUsuario[email]" ?> </td>
            </tr>
        </td>




    </table>
    <p> <a href="../telas-users/login.php" class="menu-button2">Voltar</a></p>



</body>

</html>