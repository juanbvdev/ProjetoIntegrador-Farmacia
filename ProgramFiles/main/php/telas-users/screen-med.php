<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../css/favicon.ico" type="image/x-icon">
    <title>FPB - Medico</title>
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