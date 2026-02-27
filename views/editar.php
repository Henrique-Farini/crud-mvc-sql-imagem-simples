<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<style>
    :root {
        --primary: #6d28d9; /* Roxo vibrante */
        --primary-light: #8b5cf6;
        --accent: #f5f3ff;
        --text-dark: #1e293b;
        --text-gray: #64748b;
        --white: #ffffff;
        --bg-subtle: #f8fafc;
        --error: #ef4444;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    body {
        background-color: var(--bg-subtle);
        background-image: radial-gradient(at 0% 0%, rgba(109, 40, 217, 0.05) 0px, transparent 50%),
                          radial-gradient(at 100% 100%, rgba(109, 40, 217, 0.05) 0px, transparent 50%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: var(--text-dark);
    }

    .edit-container {
        background: var(--white);
        width: 100%;
        max-width: 480px;
        padding: 40px;
        border-radius: 28px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.04);
        position: relative;
    }

    h2 {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        letter-spacing: -0.5px;
    }

    /* Estilização da Foto Atual */
    .avatar-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 30px;
    }

    .avatar-preview {
    width: 100%;
    max-height: 250px;
    object-fit: cover;
    border-radius: 16px;
    border: 2px solid #e2e8f0;
    margin-bottom: 15px;
    transition: 0.3s ease;
}

.avatar-preview:hover {
    transform: scale(1.02);
}

    /* Formulário */
    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-gray);
        margin-bottom: 8px;
        margin-left: 4px;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 14px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--bg-subtle);
    }

    input:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--white);
        box-shadow: 0 8px 20px rgba(109, 40, 217, 0.1);
    }

    /* Customização do Input de Arquivo */
    .file-input-container {
        background: var(--accent);
        border: 2px dashed #ddd6fe;
        padding: 15px;
        border-radius: 16px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
    }

    .file-input-container:hover {
        border-color: var(--primary);
        background: #ede9fe;
    }

    input[type="file"] {
        width: 100%;
        font-size: 0.8rem;
        color: var(--text-gray);
    }

    /* Botão Atualizar */
    .btn-atualizar {
        width: 100%;
        background: var(--primary);
        color: var(--white);
        border: none;
        padding: 16px;
        border-radius: 16px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        margin-top: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(109, 40, 217, 0.2);
    }

    .btn-atualizar:hover {
        background: var(--primary-light);
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(109, 40, 217, 0.3);
    }

    .btn-atualizar:active {
        transform: translateY(0);
    }

</style>
<body>
    <div class="edit-container">
        <h2>Editar Usuário</h2>

        <form method="POST" enctype="multipart/form-data">
            
            <div class="avatar-wrapper">
    <?php if (!empty($usuario['imagem'])): ?>
        <img src="<?= $usuario['imagem'] ?>" class="avatar-preview" alt="Imagem do usuário">
    <?php else: ?>
        <div class="avatar-preview" style="background: #e2e8f0; display: flex; align-items: center; justify-content: center;">
            <span style="color: #94a3b8;">Nenhuma imagem cadastrada</span>
        </div>
    <?php endif; ?>

    <div class="file-input-container">
        <label for="imagem" style="margin: 0; color: var(--primary); cursor: pointer;">
            Alterar imagem
        </label>
        <input type="file" name="imagem" id="imagem">
    </div>
</div>

            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome"
                       value="<?= htmlspecialchars($usuario['nome'] ?? ''); ?>"
                       placeholder="Ex: Matheus Silva" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email"
                       value="<?= htmlspecialchars($usuario['email'] ?? ''); ?>"
                       placeholder="email@exemplo.com" required>
            </div>

            <input type="hidden" name="imagem_atual" value="<?= $usuario['imagem']; ?>">
            
            <button type="submit" class="btn-atualizar">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>