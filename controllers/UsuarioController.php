<?php
require_once __DIR__ . '/../models/Usuario.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

if (!isset($_SESSION['adm']) && $acao != 'login') {
    include "views/login.php";
    exit;
}

if ($acao == 'listar') {

$usuarios = listarUsuarios();

include 'views/listar.php';

}

if ($acao == 'criar') {
    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $papel = $_POST['papel'];
        $imagem = '';

        if($_FILES['imagem']['name']) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
            move_uploaded_file(
    $_FILES['imagem']['tmp_name'],
    __DIR__ . '/../' . $imagem


);
            }

        inserirUsuario($nome, $email, $imagem, $login, $senha, $papel);

        header('Location: index.php');

    }
    include 'views/criar.php';
    
}

if($acao == 'login') {
    $acao = $_GET['acao'] ?? '';

    if ($acao == 'login') {
        $login = $_POST['login'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $usuarios = login_adm($login, $senha);
    }

    if($usuarios) {
        $_SESSION['adm'] = $usuarios['nome'];
        header("Location: index.php");
        exit;
    } else {
        $erro = "Login ou senha inválidos!";
    }
}

if ($acao == 'logout') {
    $acao = $_GET['acao'] ?? '';
    if ($acao == 'logout') {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}




if ($acao == 'editar') {
    $id = $_GET['id'];
    

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $imagem = $usuario['imagem'];

        if($_FILES['imagem']['name']) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
           move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . "/../" . $imagem
);
            }

        atualizarUsuario($id, $nome, $email, $imagem);

        header('Location: index.php');
    }
    $usuario = buscarUsuario($id);
    include 'views/editar.php';
}

if ($acao == 'excluir') {

excluirUsuario($_GET['id']);
header('Location: index.php');
}
