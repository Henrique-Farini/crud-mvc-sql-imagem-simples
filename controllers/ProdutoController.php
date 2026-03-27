<?php
// session_start(), includes de models, $acao e autenticação já feitos pelo index.php

if ($acao == 'listar_produtos' || ($acao == '' && ($_SESSION['papel'] ?? '') === 'user')) {
    $produtos = listarProdutos();
    include 'views/listarProduto.php';
}

if ($acao == 'criar_produto') {
    if ($_POST) {
        $nome       = $_POST['nome'];
        $preco      = $_POST['preco'];
        $descricao  = $_POST['descricao'];
        $fornecedor = $_POST['fornecedor'];
        $quantidade = $_POST['quantidade'];
        $fabricante = $_POST['fabricante'];
        $imagem     = '';

        if (!empty($_FILES['imagem']['name'])) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../' . $imagem);
        }

        inserirProduto($nome, $preco, $descricao, $fornecedor, $quantidade, $fabricante, $imagem);
        header("Location: index.php?acao=listar_produtos");
        exit;
    }
    include 'views/criarProduto.php';
}

if ($acao == 'editar_produto') {
    $id      = $_GET['id'];
    $produto = buscarProduto($id);

    if ($_POST) {
        $nome       = $_POST['nome'];
        $preco      = $_POST['preco'];
        $descricao  = $_POST['descricao'];
        $fornecedor = $_POST['fornecedor'];
        $quantidade = $_POST['quantidade'];
        $fabricante = $_POST['fabricante'];
        $imagem     = $produto['imagem'];

        if (!empty($_FILES['imagem']['name'])) {
            $imagem = 'img/' . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../' . $imagem);
        }

        atualizarProduto($id, $nome, $preco, $descricao, $fornecedor, $quantidade, $fabricante, $imagem);
        header("Location: index.php?acao=listar_produtos");
        exit;
    }

    include 'views/editarProduto.php';
}

if ($acao == 'excluir_produto') {
    excluirProduto($_GET['id']);
    header("Location: index.php?acao=listar_produtos");
    exit;
}