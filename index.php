<?php 
session_start();
include "app/config/conexao.php";
include "models/Usuario.php";
include "controllers/UsuarioController.php";

if (isset($_SESSION['adm'])) {
    echo "<p>";
    echo "Bem-Vindo, " . $_SESSION['adm'];
    echo " | ";
    echo "<a href='index.php?acao=logout'>Sair</a>";
    echo "<p>";
} else {
    include "views/login.php";
}
?>