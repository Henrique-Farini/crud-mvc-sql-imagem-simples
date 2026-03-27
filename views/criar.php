<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="./wwrwoot/css/criar.css">
</head>
<body>
    <div class="container-card">
        <h2>Cadastrar Usuário</h2>
        <span class="subtitle">Preencha os dados abaixo para criar o acesso.</span>

        <?php if (!empty($erro)): ?>
            <div class="alerta"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome"
                       value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>"
                       placeholder="Ex: João Silva" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail corporativo</label>
                <input type="email" id="email" name="email"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       placeholder="nome@empresa.com" required>
            </div>

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" id="login" name="login"
                       value="<?= htmlspecialchars($_POST['login'] ?? '') ?>"
                       placeholder="Ex: joao.silva" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Mínimo 6 caracteres" required>
            </div>

            <div class="form-group">
                <label for="papel">Papel</label>
                <select id="papel" name="papel" required>
                    <option value="">Selecione...</option>
                    <option value="adm" <?= (($_POST['papel'] ?? '') == 'adm') ? 'selected' : '' ?>>Administrador</option>
                    <option value="user" <?= (($_POST['papel'] ?? '') == 'user') ? 'selected' : '' ?>>Cliente</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagem">Foto de perfil</label>
                <input type="file" id="imagem" name="imagem">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-salvar">Finalizar Cadastro</button>
                <a href="index.php" class="btn-voltar">Voltar ao painel</a>
            </div>
        </form>
    </div>
</body>
</html>