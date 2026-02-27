<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>

<h2>Lista de Usuários</h2>

<a href="index.php?acao=criar">Criar Novo Usuário</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Imagem</th>
        <th>Ações</th>
    </tr>

    <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $u): ?>
        <tr>

            <td><?= htmlspecialchars($u['id'], ENT_QUOTES, 'UTF-8') ?></td>

            <td><?= htmlspecialchars($u['nome'], ENT_QUOTES, 'UTF-8') ?></td>

            <td><?= htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8') ?></td>

            <td>
                <?php if (!empty($u['imagem'])): ?>
                    <img src="<?= htmlspecialchars($u['imagem'], ENT_QUOTES, 'UTF-8') ?>" width="100">
                <?php else: ?>
                    Sem imagem
                <?php endif; ?>
            </td>

            <td>
                <a href="index.php?acao=editar&id=<?= $u['id'] ?>">Editar</a> |
                <a href="index.php?acao=excluir&id=<?= $u['id'] ?>"
                   onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                   Excluir
                </a>
            </td>

        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Nenhum usuário encontrado.</td>
        </tr>
    <?php endif; ?>

</table>

</body>
</html>