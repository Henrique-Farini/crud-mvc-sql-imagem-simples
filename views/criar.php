<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<body>
    <div>
        <div>
        <h2>Cadastrar Usuário</h2>

        <?php if (!empty($erro)): ?>
            <div class="alerta"><?=  htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" id="nome" name="nome"
                       value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>"
                       placeholder="Nome completo" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail *</label>
                <input type="email" id="email" name="email"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       placeholder="email@exemplo.com" required>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" id="imagem" name="imagem">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-salvar"> Salvar</button>
                <a href="index.php?acao=cadastrar" class="btn-voltar">← Voltar</a>
            </div>

            </form>

    </div>
</div>
</body>
</html>