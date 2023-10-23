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
    require_once "../../config/database.php";
    require_once "../Dao/UsuarioDAO.php";
    require_once "../../config/existent-user.php";

    $indexForm = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<script>
                var cpfValido = validarCPF("' . $_POST["cpf"] . '");
                var emailValido = validarEmail("' . $_POST["email"] . '");
                var senhaValida = validarSenha("' . $_POST["senha1"] . '");
    
                if (!cpfValido || !emailValido || !senhaValida) {
                    alert("Por favor, corrija os campos antes de enviar o formulário.");
                    return false;
                }
             </script>';
        $dados = array(
            "nome" => $_POST["nome"],
            "cpf_cnpj" => $_POST["cpf"],
            "idade" => $_POST["idade"],
            "endereco" => $_POST["endereco"],
            "email" => $_POST["email"],
            "permissao" => 2,
            "senha" => $_POST["senha1"]
        );

        if (userexistente($_POST["cpf"], $_POST["endereco"])) {
            $usuarioDAO = new UsuarioDAO($pdo);
            $usuarioDAO->cadastro($dados);
            header('Location: ../../html/index.html');
            exit;
        }
    }
    ?>


    <?php
    if ($indexForm) { ?>
        <form action="" method="post" class="password-form" data-tipo-formulario="medico" onsubmit="return onSubmitForm(this); validarCPF(document.getElementById('cpf').value); limparAvisoCPF();">
            <p>
            <h1>Cadastro de Médico</h1>
            </p>
            <table>
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
                        <td><input type="text" name="cpf" id="CPF" placeholder="Informe seu CPF (Apenas números!!!)" oninput="atualizarCampoCPF(); validarCPF(); limparAvisoCPF();">
                            <div id="cpfWarning" style="color: red;"></div>
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
                        <td><input type="text" name="email" id="email" placeholder="Informe seu Email" oninput="showSuggestions()">
                            <div id="suggestions"></div>
                        </td>
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
                        <td><input type="password" name="senha1" id="senha1" placeholder="Crie uma senha"></td>
                        <td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Senha</h2>
                        </td>
                        <td><input type="password" name="senha2" id="senha2" placeholder="Confirme sua senha">
                        </td>
                    </tr>
                </td>
                <input type="hidden" id="tipoFormulario" name="tipoFormulario" value="medico">
            </table>
            <p class="password-error" style="color: red;"></p>
            <input type="submit" name="cadButton" value="Cadastrar" class="account-button2">
        </form>

    <?php } ?>

    <a href="../cadastro/cadastro.php" class="menu-button2">Voltar</a>

    <script src="../../JavaScript/cpf.js"></script>
    <script src="../../JavaScript/email.js"></script>
    <script src="../../JavaScript/senha.js"></script>
    <script src="../../JavaScript/onsubmit.js"></script>
    <script src="../../JavaScript/validar-med.js"></script>
</body>

</html>