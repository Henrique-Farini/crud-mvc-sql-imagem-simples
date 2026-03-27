<?php

function conectar() {
    $con = mysqli_connect("10.140.170.36", "root", "mlaurinha06", "bd_loja_mvc", 3307);

    if (!$con) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    return $con;
}