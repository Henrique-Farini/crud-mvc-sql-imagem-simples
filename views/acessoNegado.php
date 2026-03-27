<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acesso Negado</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', system-ui, sans-serif; }
        body {
            background: radial-gradient(circle at top right, #eeefff, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: #fff;
            padding: 48px 40px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.06);
            text-align: center;
            max-width: 380px;
            width: 100%;
        }
        .icon { font-size: 3rem; margin-bottom: 16px; }
        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 8px;
        }
        p { color: #6b7280; font-size: 0.9rem; margin-bottom: 28px; }
        a {
            display: inline-block;
            background: #6366f1;
            color: #fff;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.2s;
        }
        a:hover { background: #4f46e5; transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">🔒</div>
        <h2>Acesso Negado</h2>
        <p>Você não tem permissão para acessar esta página.</p>
        <a href="index.php?acao=listar_produtos">Voltar para Produtos</a>
    </div>
</body>
</html>