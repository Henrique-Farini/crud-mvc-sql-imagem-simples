<?php
require_once __DIR__ . '/../app/config/conexao.php';

function listarProdutos() {
    $con = conectar();
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function inserirProduto($nome, $preco, $descricao, $fornecedor, $quantidade, $fabricante, $imagem) {
    $con = conectar();

    $sql = "INSERT INTO produtos (nome, preco, descricao, fornecedor, quantidade, fabricante, imagem)
            VALUES ('$nome', '$preco', '$descricao', '$fornecedor', '$quantidade', '$fabricante', '$imagem')";

    mysqli_query($con, $sql);
}

function buscarProduto($id) {
    $con = conectar();
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resultado);
}

function atualizarProduto($id, $nome, $preco, $descricao, $fornecedor, $quantidade, $fabricante, $imagem) {
    $con = conectar();

    $sql = "UPDATE produtos SET
            nome='$nome',
            preco='$preco',
            descricao='$descricao',
            fornecedor='$fornecedor',
            quantidade='$quantidade',
            fabricante='$fabricante',
            imagem='$imagem'
            WHERE id=$id";

    mysqli_query($con, $sql);
}

function excluirProduto($id) {
    $con = conectar();
    $sql = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($con, $sql);
}