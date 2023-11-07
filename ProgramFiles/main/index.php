<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>FPB - Início</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ed891ee09d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<header>
    <div class="container" id="nav-container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <a href="?page=index" class="navbar-brand">
                <img id="logo1" src="css/images/12.png" alt="">
                Farmacia Popular</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="O que desejas?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                <div class="navbar-nav">
                    <a href="?page=index" class="nav-item nav-link" id="home-menu">Inicio</a>
                    <a href="?page=cadastro" class="nav-item nav-link" id="cad-menu">Cadastro</a>
                    <a href="?page=login" class="nav-item nav-link" id="log-menu">Login</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Minha Conta</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Configurações</a></li>
                            <li><a class="dropdown-item" href="#">Sobre</a></li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </nav>
    </div>
</header>

<body>

</body>

<?php


switch (@$_REQUEST['page']) {

    case "cadastro":
        include 'php/cadastro/cadastro.php';
        include('config/database.php');
        include('config/existent-user.php');
        include('php/Dao/UsuarioDAO.php');
        break;

    case "cadastro-cliente":
        include 'php/cadastro/cad-clie.php';
        include('config/database.php');
        include('config/existent-user.php');
        include('php/Dao/UsuarioDAO.php');
        break;
    case "cadastro-medico":
        include 'php/cadastro/cad-med.php';
        include('config/database.php');
        include('config/existent-user.php');
        include('php/Dao/UsuarioDAO.php');
        break;

    case "cadastro-farmacia":
        include 'php/cadastro/cad-farm.php';
        include('config/database.php');
        include('config/existent-user.php');
        include('php/Dao/UsuarioDAO.php');
        break;

    case "login":
        include 'php/telas-users/login.php';
        include('config/database.php');
        include('config/existent-user.php');
        include('php/Dao/UsuarioDAO.php');
        break;
    case "index":
        print "<h1>‎</h1>
        </p>
        <table>
            <td>
                <div class='column'>
            <td><input type='text' name='pesquisa' placeholder='O que deseja?'></td>
            </div>
            </td>
        </table>";
        break;

    default:
    $_REQUEST['page'] = 'index';
}

?>

</html>