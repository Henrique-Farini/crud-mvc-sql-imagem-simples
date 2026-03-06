<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login do Sistema</h2>

    <?php if (isset($erro)) { ?>
    <p style="color: red;"><?php echo $erro; ?></p>
<?php } ?>

<form action="index.php?acao=login" method="POST">

Login:
<input type="text" name="login"><br><br>

Senha:
<input type="password" name="senha"><br><br>

<button type="submit">Entrar</button>
</form>
    
</body>
</html>