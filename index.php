<?php
session_start();

include "app/config/conexao.php";
include "models/Usuario.php";
include "models/Produto.php";

$acao = $_GET['acao'] ?? '';

/* ================= LOGIN ================= */
if ($acao == 'login') {
    $login   = $_POST['login'] ?? '';
    $senha   = $_POST['senha'] ?? '';
    $usuario = login_adm($login, $senha);

    if ($usuario) {
        $_SESSION['adm']     = true;
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['papel']   = $usuario['papel'];
        header("Location: index.php");
        exit;
    } else {
        $erro = "Login ou senha inválidos!";
        include "views/login.php";
        exit;
    }
}

/* ================= LOGOUT ================= */
if ($acao == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}

/* ================= NÃO LOGADO ================= */
if (!isset($_SESSION['usuario'])) {
    include "views/login.php";
    exit;
}

/* ================= CONTROLE DE ACESSO ================= */
$papel = $_SESSION['papel'] ?? 'user';

// Ações restritas ao administrador — cliente não pode acessar mesmo digitando a URL
$acoes_adm = ['criar', 'editar', 'excluir', 'criar_produto', 'editar_produto', 'excluir_produto'];

if (in_array($acao, $acoes_adm) && $papel !== 'adm') {
    http_response_code(403);
    include "views/acessoNegado.php";
    exit;
}

// Cliente sem ação: redireciona direto para produtos
if ($papel === 'user' && $acao === '') {
    header("Location: index.php?acao=listar_produtos");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <style>
        body {
    background: #f8fafc;
    display: flex;
    flex-direction: column; /* 🔥 ISSO RESOLVE */
}
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', system-ui, sans-serif; }

        body { background: #f8fafc; }

        .topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 32px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 6px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-brand {
            font-weight: 800;
            font-size: 1.1rem;
            background: linear-gradient(to right, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .topbar-nav { display: flex; align-items: center; gap: 6px; }

        .topbar-nav a {
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 7px 16px;
            border-radius: 8px;
            transition: 0.2s;
            color: #6b7280;
        }

        .topbar-nav a:hover  { background: #f1f5f9; color: #1f2937; }
        .topbar-nav a.active { background: #ede9fe; color: #6d28d9; }

        .topbar-right { display: flex; align-items: center; gap: 12px; }

        .topbar-user { font-size: 0.85rem; color: #6b7280; }
        .topbar-user strong { color: #1f2937; }

        .badge {
            font-size: 0.72rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 99px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-adm  { background: #ede9fe; color: #6d28d9; }
        .badge-user { background: #dcfce7; color: #15803d; }

        .btn-logout {
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            color: #ef4444;
            padding: 7px 14px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-logout:hover { background: #fee2e2; }
    </style>
</head>
<body>

<nav class="topbar">
    <span class="topbar-brand">&#9670; Sistema</span>

    <div class="topbar-nav">
        <?php if ($papel === 'adm'): ?>
            <a href="index.php"
               class="<?= !str_contains($acao, 'produto') ? 'active' : '' ?>">
                Usuários
            </a>
        <?php endif; ?>
        <a href="index.php?acao=listar_produtos"
           class="<?= str_contains($acao, 'produto') ? 'active' : '' ?>">
            Produtos
        </a>
    </div>

    <div class="topbar-right">
        <span class="topbar-user">
            Olá, <strong><?= htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8') ?></strong>
        </span>
        <span class="badge <?= $papel === 'adm' ? 'badge-adm' : 'badge-user' ?>">
            <?= $papel === 'adm' ? 'Admin' : 'Cliente' ?>
        </span>
        <a href="index.php?acao=logout" class="btn-logout">Sair</a>
    </div>
</nav>

<?php
/* ================= ROTEAMENTO ================= */
if (str_contains($acao, 'produto') || $papel === 'user') {
    include "controllers/ProdutoController.php";
} else {
    include "controllers/UsuarioController.php";
}
?>

</body>
</html>