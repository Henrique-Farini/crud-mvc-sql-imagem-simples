<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="criar.css">
</head>
<style>
        :root {
        --primary-purple: #6366f1;
        --secondary-purple: #4f46e5;
        --bg-glass: rgba(255, 255, 255, 0.9);
        --text-main: #1f2937;
        --text-muted: #6b7280;
        --bg-body: #f8fafc;
    }

    * {
        box-sizing: border-box;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    body {
        background: radial-gradient(circle at top right, #eeefff, #ffffff);
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        color: var(--text-main);
    }

    .container-card {
        background: var(--bg-glass);
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 450px;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    h2 {
        font-weight: 800;
        font-size: 1.8rem;
        margin-bottom: 8px;
        letter-spacing: -0.025em;
        background: linear-gradient(to right, var(--primary-purple), #a855f7);
        -webkit-text-fill-color: transparent;
    }

    .subtitle {
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 30px;
        display: block;
    }

    .alerta {
        background-color: #fee2e2;
        color: #dc2626;
        padding: 12px;
        border-radius: 12px;
        font-size: 0.85rem;
        margin-bottom: 20px;
        border-left: 4px solid #dc2626;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--text-main);
        padding-left: 4px;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 14px 16px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        background: #fcfcfd;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    input:focus {
        outline: none;
        border-color: var(--primary-purple);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        background: #fff;
    }

    /* Estilização Custom do Input File */
    input[type="file"] {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    input[type="file"]::file-selector-button {
        background: #f1f5f9;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        margin-right: 15px;
        transition: 0.3s;
    }

    input[type="file"]::file-selector-button:hover {
        background: #e2e8f0;
    }

    .btn-group {
        margin-top: 32px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .btn-salvar {
        background: var(--primary-purple);
        color: white;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: transform 0.2s, background 0.2s;
        box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.3);
    }

    .btn-salvar:hover {
        background: var(--secondary-purple);
        transform: translateY(-2px);
    }

    .btn-salvar:active {
        transform: translateY(0);
    }

    .btn-voltar {
        text-align: center;
        text-decoration: none;
        color: var(--text-muted);
        font-size: 0.85rem;
        padding: 10px;
        transition: color 0.2s;
    }

    .btn-voltar:hover {
        color: var(--primary-purple);
    }

</style>
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
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" placeholder="Ex: João Silva" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail corporativo</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="nome@empresa.com" required>
            </div>

            <div class="form-group">
                <label for="imagem">Foto de perfil</label>
                <input type="file" id="imagem" name="imagem">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-salvar">Finalizar Cadastro</button>
                <a href="index.php?acao=cadastrar" class="btn-voltar">Voltar ao painel</a>
            </div>
        </form>
    </div>
</body>
</html>