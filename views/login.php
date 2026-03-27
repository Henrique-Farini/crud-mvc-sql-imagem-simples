<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    :root {
        --primary: #6366f1;
        --secondary: #4f46e5;
        --bg-glass: rgba(255, 255, 255, 0.92);
        --text-main: #1f2937;
        --text-muted: #6b7280;
    }

    * {
        box-sizing: border-box;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        margin: 0;
        padding: 0;
    }

    body {
        background: radial-gradient(circle at top right, #eeefff, #ffffff);
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: var(--text-main);
    }

    .container-card {
        background: var(--bg-glass);
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 400px;
        padding: 44px 40px;
        border-radius: 24px;
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.06), 0 10px 10px -5px rgba(0,0,0,0.02);
        border: 1px solid rgba(255,255,255,0.4);
    }

    h2 {
        font-weight: 800;
        font-size: 1.9rem;
        margin-bottom: 6px;
        letter-spacing: -0.025em;
        background: linear-gradient(to right, var(--primary), #a855f7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .subtitle {
        color: var(--text-muted);
        font-size: 0.88rem;
        margin-bottom: 32px;
        display: block;
    }

    .alerta {
        background-color: #fee2e2;
        color: #dc2626;
        padding: 12px 14px;
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
        padding-left: 2px;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 13px 16px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        background: #fcfcfd;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        color: var(--text-main);
        appearance: none;
        -webkit-appearance: none;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(99,102,241,0.1);
        background: #fff;
    }

    .btn-entrar {
        width: 100%;
        background: var(--primary);
        color: white;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        margin-top: 10px;
        transition: transform 0.2s, background 0.2s;
        box-shadow: 0 4px 6px -1px rgba(99,102,241,0.35);
    }

    .btn-entrar:hover {
        background: var(--secondary);
        transform: translateY(-2px);
    }

    .btn-entrar:active {
        transform: translateY(0);
    }
</style>
<body>
    <div class="container-card">
        <h2>Bem-vindo</h2>
        <span class="subtitle">Acesse o sistema com suas credenciais.</span>

        <?php if (!empty($erro)): ?>
            <div class="alerta"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form action="index.php?acao=login" method="POST">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" placeholder="Seu usuário" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="••••••••" required>
            </div>

            <div class="form-group">
                <label for="papel">Papel</label>
                <select id="papel" name="papel" required>
                    <option value="">Selecione...</option>
                    <option value="adm">Administrador</option>
                    <option value="user">Cliente</option>
                </select>
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>
        </form>
    </div>
</body>
</html>