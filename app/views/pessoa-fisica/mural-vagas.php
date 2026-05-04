<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
    <link rel="stylesheet" href="style/style-card-vaga.css">
    <link rel="stylesheet" href="style/style-mural.css">

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
            <h2><a href="<?= base_url ?>public/index.php?action=logout-pj">Sair</a></h2>
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <ul>
            <a href="<?= base_url ?>public/index.php?action=mural-vagas"><li>Mural de Vagas</li></a>
            <a href="#"><li>Empresas</li></a>
            <a href="<?= base_url ?>public/index.php?action=view-perfil-candidato"><li>Perfil do Candidato</li></a>
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
    
    <main>
        <section class="mural-vagas">
            <?php foreach ($vagas as $v): ?>
            <div class="card-vaga">
                <a href="<?= base_url ?>public/index.php?action=view-vaga&cod=<?= $v['codigo']?>&cnpj=<?= $v['pessoas_juridicas_cnpj'] ?>">
                <img src="assets/img/logo-exemplo.png">
                <h2><?= $v['nome']?></h2>
                <div class="categoria">
                    <h3><?= $v['funcao']?></h3>
                    <h3>Presencial</h3>
                </div>
                <p><strong>Cidade:</strong> Presidente Prudente</p>
                <p><?= substr($v['descricao'], 0, 80) ?>...</p>
                <p class="btn"><strong>Saber Mais</strong></p>
                </a>
            </div>
            <?php endforeach; ?>
        </section>
    </main>

    <div class="space-fix"></div>
    
    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
        </div>
    </footer>
</body>
</html>