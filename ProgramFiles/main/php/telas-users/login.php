        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logButton"])) {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];

            $usuarioDAO = new UsuarioDAO($pdo);

            autenticarUsuario($nome, $cpf, $usuarioDAO);
        }

        function autenticarUsuario($nome, $cpf, $usuarioDAO)
        {
            $usuario = $usuarioDAO->buscarPorNomeECpf($nome, $cpf);

            if ($usuario) {
                $permissao = $usuario['permissao'];

                if ($permissao == 1) {
                    header('Location: ../telas-users/screen-clie.php?id=' . $usuario['id']);
                    session_start();
                    $_SESSION['username'] = $nome;
                    $_SESSION['password'] = $cpf;
                    exit();
                } elseif ($permissao == 2) {
                    header('Location: ../telas-users/screen-med.php?id=' . $usuario['id']);
                    session_start();
                    $_SESSION['username'] = $nome;
                    $_SESSION['password'] = $cpf;
                    exit();
                } elseif ($permissao == 3) {
                    echo 'Funcionário logado';
                } elseif ($permissao == 4) {
                    header('Location: ../telas-users/screen-farm.php?id=' . $usuario['id']);
                    session_start();
                    $_SESSION['username'] = $nome;
                    $_SESSION['password'] = $cpf;
                    exit();
                }
            } else {
                echo 'Usuário não encontrado. Tente novamente.';
            }
        }
        ?>

        <form action="" method="post">
            <table>
                <p>
                <h1>Login</h1>
                </p>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Senha</h2>
                    </td>
                    <td><input type="password" name="senha" placeholder="Informe sua Senha"></td>
                </tr>
            </table>
            <input type="submit" name="logButton" value="Login" class="account-button2">
        </form>
        <a href="?page=index" class="menu-button2">Voltar</a>
        <script src="../../JavaScript/cpf.js"></script>