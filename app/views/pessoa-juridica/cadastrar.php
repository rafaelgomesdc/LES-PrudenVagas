<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">

    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <script src="validacao.js" defer></script>
    <title>Suas vagas, só aqui na PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png">
                <h1>PrudenVagas</h1>
            </div>
        </div>
    </header>
    <nav>
        <img src="assets/img/1.png">
    </nav>
    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Empresa</h1>
                <form method="POST" action="<?= base_url ?>public/index.php?action=cadastrar-pj">
                    <input type="text"   placeholder="CNPJ" name="inputCNPJ" required>
                    <input type="text" placeholder="Razão Social" name="inputRazaoSocial" required>
                    <input type="email" placeholder="Email" name="inputEmailEmpresa" required>
                    <input type="tel" placeholder="Telefone" name="inputTelefoneEmpresa">
                    <input type="text" placeholder="Categoria" name="inputCategoria">
                    <input type="password" id="senha" placeholder="Senha" name="inputSenhaEmpresa" required>
                    <br><br>
                    <button type="submit">Cadastrar</button>
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