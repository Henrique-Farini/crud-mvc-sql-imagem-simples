<?php
// session_start(), includes de models, $acao e autenticação já feitos pelo index.php

if ($acao == 'listar' || $acao == '') {
    $usuarios = listarUsuarios();
    include 'views/listar.php';
}

if ($acao == 'criar') {
    if ($_POST) {
        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $login  = $_POST['login'];
        $senha  = $_POST['senha'];
        $papel  = $_POST['papel'];
        $imagem = '';

        if (!empty($_FILES['imagem']['name'])) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../' . $imagem);
        }

        inserirUsuario($nome, $email, $imagem, $login, $senha, $papel);
        header('Location: index.php');
        exit;
    }
    include 'views/criar.php';
}

if ($acao == 'editar') {
    $id      = $_GET['id'];
    $usuario = buscarUsuario($id);

    if ($_POST) {
        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $imagem = $usuario['imagem'];

        if (!empty($_FILES['imagem']['name'])) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../' . $imagem);
        }

        atualizarUsuario($id, $nome, $email, $imagem);
        header('Location: index.php');
        exit;
    }

    include 'views/editar.php';
}

if ($acao == 'excluir') {
    excluirUsuario($_GET['id']);
    header('Location: index.php');
    exit;
}