<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <div>
        <h2>Editar Usuário</h2>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome *</label>
            <input type="text" id="nome" name="nome"
                   value="<?php echo htmlspecialchars($usuario['nome'] ?? ''); ?>"
                   placeholder="Nome completo" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" id="email" name="email"
                   value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>"
                   placeholder="email@exemplo.com" required>
        </div>
        <?php if ($usuario['imagem']) { ?>
        <img src="<?php echo $usuario['imagem']; ?>" width="100">
        <?php } ?>
        
        Nova Imagem
        <input type="file" name="imagem" id="imagem"><br><br>
        <input type="hidden" name="imagem_atual" value="<?php echo $usuario['imagem']; ?>">
        <button type="submit" class="btn-atualizar"> Atualizar</button>

    </form>
</body>
</html>