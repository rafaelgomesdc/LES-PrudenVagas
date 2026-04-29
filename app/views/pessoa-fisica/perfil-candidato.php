<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
    <link rel="stylesheet" href="style/style-perfil-candidato.css">

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

    <section class="perfil-candidato">
        <?php $pf = $pessoa_fisica; ?>
        <div class="container-perfil-candidato">
            <div class="bloco-esquerdo">
                <img src="<?= base_url ?>assets/img/logo-exemplo.png" alt="" class="img-perfil">
                <h2>Contatos: </h2>
                <h3>Telefone:<br><?= $pf['telefone'] ?></h3>
                <h3>E-mail:<br><?= $pf['email'] ?></h3>
            </div>
            <div class="bloco-direito">
                <div class="bloco-direito-info-padrao">
                    <h1><?= $pf['nome'] ?> <?= $pf['sobrenome'] ?></h1>
                    <h2>Idade: 123</h2>
                </div>

                <div class="bloco-direito-biografia">
                    <h2>Biografia</h2>
                    <p><?= $pf['biografia'] ?></p>
                </div>

                <div class="bloco-direito-formacao">
                    <h2>Formações</h2>
                    <ul>
                        <li>Formação 1</li>
                        <li>Formação 2</li>
                        <li>Formação 3</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
        </div>
    </footer>
</body>
</html>