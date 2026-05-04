<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">

    <title>PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/proprio/logo.png">
                <h1>PrudenVagas</h1>
            </div>
            <h2><a href="../login/select-login.html">Sair</a></h2>
        </div>
    </header>

    <nav>
        <ul>
            <a href="banco-talentos.html"><li>Banco de Talentos</li></a>
            <a href="<?= base_url ?>public/index.php?action=gerenciar-vagas"><li>Suas Vagas</li></a>
            <a href="perfil-empresa.html"><li>Perfil da Empresa</li></a>
        </ul>
    </nav>

    <section class="mural-candidatos">
        <div class="container-mural-candidatos">
            <?php if (!empty($candidatos)): ?>
                <?php foreach ($candidatos as $candidato): ?>
                    <div class="card-candidato">
                        <a href="public/index.php?action=ver-perfil&id=<?= $candidato['CPF'] ?>">
                            <img src="assets/img/logo-exemplo.png" alt="Foto de <?= htmlspecialchars($candidato['nome']) ?>">
                            
                            <h2><?= htmlspecialchars($candidato['nome'] . " " . $candidato['sobrenome']) ?></h2>
                            
                            <div class="interesses">
                                <!-- Aqui você pode expandir para categorias reais do seu banco -->
                                <h3>Candidato</h3>
                                <h3>Disponível</h3>
                            </div>

                            <p><strong>Cidade:</strong> <?= htmlspecialchars($candidato['cidade']) ?></p>
                            
                            <div class="biografia-resumo">
                                <p><?= htmlspecialchars(substr($candidato['biografia'], 0, 80)) ?>...</p>
                            </div>

                            <p class="btn"><strong>Ver Perfil Completo</strong></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum candidato encontrado no momento.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
        </div>
    </footer>
</body>
</html>