<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>

    <style>
        :root {
            --primary: #6d28d9;
            --primary-hover: #5b21b6;
            --bg-body: #f8fafc;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger: #ef4444;
            --edit: #8b5cf6;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--text-main);
            padding: 40px 20px;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
        }

        .header-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            margin: 0;
            color: var(--primary);
        }

        .btn-create {
            background: var(--primary);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(109,40,217,0.2);
        }

        .btn-create:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        th {
            text-align: left;
            padding: 12px 20px;
            color: var(--text-muted);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 15px 20px;
            background: #fdfdff;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        td:first-child { border-left: 1px solid #f1f5f9; border-radius: 12px 0 0 12px; }
        td:last-child  { border-right: 1px solid #f1f5f9; border-radius: 0 12px 12px 0; }

        tr:hover td {
            background: #f5f3ff;
            border-color: #ddd6fe;
        }

        .user-img {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            object-fit: cover;
            display: block;
            box-shadow: 0 4px 10px rgba(109,40,217,0.15);
            border: 3px solid #fff;
            transition: transform 0.3s ease;
        }

        .user-img:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(109,40,217,0.25);
        }

        .no-img {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            background: #f1f5f9;
            border-radius: 16px;
            color: #94a3b8;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-edit  { background: #ede9fe; color: var(--edit); }
        .btn-edit:hover  { background: var(--edit); color: white; }
        .btn-delete { background: #fee2e2; color: var(--danger); }
        .btn-delete:hover { background: var(--danger); color: white; }
    </style>
</head>

<body>
<div class="container">
    <div class="header-area">
        <h2>Produtos</h2>
        <a href="index.php?acao=criar_produto" class="btn-create">+ Adicionar Produto</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $p): ?>
                <tr>
                    <td style="color:var(--text-muted); font-weight:600;">
                        <!-- CORRIGIDO: era $u['id'], agora $p['id'] -->
                        #<?= htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td>
                        <!-- CORRIGIDO: era $u['nome'], agora $p['nome'] -->
                        <div style="font-weight:700;"><?= htmlspecialchars($p['nome'], ENT_QUOTES, 'UTF-8') ?></div>
                        <!-- CORRIGIDO: era $p['email'] (produtos não têm email), agora exibe preço e descrição -->
                        <div style="font-size:0.8rem; color:var(--text-muted);">
                            R$ <?= htmlspecialchars($p['preco'], ENT_QUOTES, 'UTF-8') ?>
                            &mdash; <?= htmlspecialchars($p['descricao'], ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    </td>

                    <td style="vertical-align:middle;">
                        <?php if (!empty($p['imagem'])): ?>
                            <img src="<?= htmlspecialchars($p['imagem'], ENT_QUOTES, 'UTF-8') ?>" class="user-img">
                        <?php else: ?>
                            <div class="no-img">Sem Foto</div>
                        <?php endif; ?>
                    </td>

                    <td>
                        <div class="actions">
                            <a href="index.php?acao=editar_produto&id=<?= $p['id'] ?>" class="btn-action btn-edit">Editar</a>
                            <a href="index.php?acao=excluir_produto&id=<?= $p['id'] ?>"
                               class="btn-action btn-delete"
                               onclick="return confirm('Excluir este produto permanentemente?')">
                               Excluir
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center; color:var(--text-muted);">Nenhum produto encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>