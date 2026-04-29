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
            <div class="card-candidato">
                <a href="#">
                <img src="assets/img/logo-exemplo.png">
                <h2>Nome do Candidato</h2>
                <div class="interesses">
                    <h3>Estágio</h3>
                    <h3>Presencial</h3>
                </div>
                <p><strong>Cidade:</strong> Nome da Cidade</p>
                <ul class="habilidades">
                    <li>habilidade 1</li>
                    <li>habilidade 2</li>
                    <li>habilidade 3</li>
                </ul>
                <p class="btn"><strong>Ver Perfil</strong></p>
                </a>
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