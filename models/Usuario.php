<?php
require_once __DIR__ . '/../app/config/conexao.php';

function listarUsuarios() {
    $con = conectar();
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function inserirUsuario($nome, $email, $imagem) {
    $con = conectar();
    $sql = "INSERT INTO usuarios (nome, email, imagem) VALUES ('$nome', '$email', '$imagem')";
    mysqli_query($con, $sql);
}

function buscarUsuario($id) {
    $con = conectar();
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($id, $nome, $email, $imagem) {
    $con = conectar();
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', imagem = '$imagem' WHERE id = $id";
    mysqli_query($con, $sql);
}

function excluirUsuario($id) {
    $con = conectar();
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($con, $sql);
}