<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
    <link rel="stylesheet" href="style/style-page-vaga.css">

    <title>PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png">
                <h1>PrudenVagas</h1>
            </div>
            <?php if (isset($_SESSION['usuario'])): ?>
            <h2><a href="<?= base_url ?>public/index.php?action=logout-pf">Sair</a></h2>
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <ul>
            <a href="<?= base_url ?>public/index.php?action=mural-vagas"><li>Mural de Vagas</li></a>
            <a href="#"><li>Empresas</li></a>
            <a href="perfil-candidato.php"><li>Perfil do Candidato</li></a>
            <?php if (!isset($_SESSION['usuario'])): ?>
            <li class="nav-element-drop">
                <a>Cadastrar</a>
                <div class="nav-element-drop-content">
                    <a href="<?= base_url ?>public/index.php?action=view-cadastrar-pf">Candidato</a>
                    <a href="<?= base_url ?>public/index.php?action=view-cadastrar-pj">Empresa</a>
                </div>
            </li>
            <li class="nav-element-drop">
                <a>Entrar</a>
                <div class="nav-element-drop-content">
                    <a href="<?= base_url ?>public/index.php?action=view-login-pf">Candidato</a>
                    <a href="<?= base_url ?>public/index.php?action=view-login-pj">Empresa</a>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
    
    <section class="vaga">
        <?php $v = $vaga; ?>
        <?php $pj = $empresa; ?>
        <img src="<?= base_url ?>assets/img/logo-exemplo.png">
        <h1 class="titulo-vaga"><?= $v['nome'] ?></h1>

        <h3 class="categoria-vaga"><?= $v['funcao'] ?></h3>
        <h3 class="tipo-vaga">Presencial</h3>

        <p class="descricao"><?= $v['descricao'] ?></p>

        <h3 class="sobre-empresa">Sobre a empresa:</h3>
        <p class="sobre-empresa">
            <?= $pj['razao_social'] ?> | <?= $pj['categoria']; ?>
        </p>
        
        <div class="candidatacao">
            <div class="candidatacao-info">
                <h1 class="titulo-candidatacao">Candidate-se</h1>
                <p>Ao clicar em "Candidatar-se" a empresa receberá sua candidatação.</p>
            </div>
            <a href="<?= base_url ?>public/index.php?action=candidatar-se&cod=<?= $v['codigo'] ?>&cnpj=<?= $pj['cnpj'] ?>" id="botao">Candidatar-se</a>
        </div>
    </section>

    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
        </div>
    </footer>
</body>
</html>