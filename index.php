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

$acoes_adm = ['criar', 'editar', 'excluir', 'criar_produto', 'editar_produto', 'excluir_produto'];

if (in_array($acao, $acoes_adm) && $papel !== 'adm') {
    http_response_code(403);
    include "views/acesso_negado.php";
    exit;
}

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
:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --bg: #f8fafc;
    --text: #1f2937;
    --muted: #6b7280;
}

/* RESET */
*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Inter', system-ui, sans-serif;
}

body {
    background: var(--bg);
    color: var(--text);
}

/* TOPBAR */
.topbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 64px;
    padding: 0 32px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);

    border-bottom: 1px solid #e2e8f0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);

    z-index: 999;
}

.topbar-brand {
    font-weight: 800;
    font-size: 1.2rem;
    background: linear-gradient(to right, var(--primary), #a855f7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.topbar-nav {
    display: flex;
    gap: 8px;
}

.topbar-nav a {
    text-decoration: none;
    font-weight: 600;
    padding: 8px 16px;
    border-radius: 10px;
    color: var(--muted);
    transition: 0.2s;
}

.topbar-nav a:hover {
    background: #f1f5f9;
    color: var(--text);
}

.topbar-nav a.active {
    background: #ede9fe;
    color: #6d28d9;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 14px;
}

.topbar-user {
    font-size: 0.85rem;
    color: var(--muted);
}

.topbar-user strong {
    color: var(--text);
}

.badge {
    font-size: 0.7rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
}

.badge-adm {
    background: #ede9fe;
    color: #6d28d9;
}

.badge-user {
    background: #dcfce7;
    color: #15803d;
}

.btn-logout {
    text-decoration: none;
    color: #ef4444;
    padding: 7px 14px;
    border-radius: 8px;
}

.btn-logout:hover {
    background: #fee2e2;
}

/* 🔥 ESSENCIAL */
.main-content {
    margin-top: 64px;
    padding: 24px;
}

/* RESPONSIVO */
@media (max-width: 768px) {
    .topbar {
        padding: 0 16px;
    }

    .topbar-user {
        display: none;
    }
}
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

<!-- 🔥 AQUI ESTÁ A CORREÇÃO -->
<div class="main-content">

<?php
if (str_contains($acao, 'produto') || $papel === 'user') {
    include "controllers/ProdutoController.php";
} else {
    include "controllers/UsuarioController.php";
}
?>

</div>

</body>
</html>