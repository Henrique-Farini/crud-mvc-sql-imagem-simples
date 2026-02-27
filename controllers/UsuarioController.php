<?php
require_once __DIR__ . '/../models/Usuario.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

if ($acao == 'listar') {

$usuarios = listarUsuarios();

include 'views/listar.php';

}

if ($acao == 'criar') {
    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $imagem = '';

        if($_FILES['imagem']['name']) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
            move_uploaded_file(
    $_FILES['imagem']['tmp_name'],
    __DIR__ . '/../' . $imagem
);
            }

        inserirUsuario($nome, $email, $imagem);

        header('Location: index.php');

    }
    include 'views/criar.php';
    
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
