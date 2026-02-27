<?php

function conectar() {
    $con = mysqli_connect("localhost", "root", "Henri032611@", "bd_loja_mvc", 3307);

    if (!$con) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    return $con;
}