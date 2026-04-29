<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>-->

    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
    
    <title>PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png">
                <h1>PrudenVagas</h1>
            </div>
            <h2><a href="<?= base_url ?>public/index.php?action=logout-pj">Sair</a></h2>
        </div>
    </header>
    </header>

    <nav>
        <ul>
            <a href="banco-talentos.html"><li>Banco de Talentos</li></a>
            <a href="<?= base_url ?>public/index.php?action=gerenciar-vagas"><li>Suas Vagas</li></a>
            <a href="perfil-empresa.html"><li>Perfil da Empresa</li></a>
        </ul>
    </nav>

    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Vaga</h1>
                <form method="POST" action="<?= base_url ?>public/index.php?action=cadastrar-vaga">
                    <input type="text" placeholder="Nome da Vaga" name="nome" required>
                    <input type="text" placeholder="Função" name="funcao">
                    <input type="text" placeholder="Descrição" name="descricao">
                    <input type="number" placeholder="Pagamento" name="pagamento" required>
                    <input type="number" placeholder="Quantidade de Vagas" name="quantidade">
                    <br>
                    <label for="o">Selecionar foto de capa:</label>
                    <br>
                    <label for="file-upload" id="o" class="custom-file-upload">Escolher arquivo</label>
                    <input id="file-upload" type="file">  
                    <span id="file-name">Nenhum arquivo escolhido</span>
                    <br><br>
                    <button type="submit" id="botao">CADASTRAR</button>
                </form>
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