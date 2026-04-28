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
                <h1>Login Empresa</h1>
                <form method="POST" action="<?= base_url ?>public/index.php?action=login-pj">
                    <input type="text"   placeholder="CNPJ" name="inputCNPJ" required>
                    <input type="password" id="senha" placeholder="Senha" name="inputSenha" required>
                    <br><br>
                    <button type="submit" class="submit">Login</button>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <section class="rodape">
            <div class="atendimento">
                <h3>ATENDIMENTO AO CLIENTE</h3>
                <p>Central de ajuda</p>
                <p>Fale Conosco</p>
                <p>Ouvidoria</p>
            </div>
            <div class="sobre">
                <h3>SOBRE A PRRUDENVAGAS</h3>
                <p>Sobre Nós</p>
                <p>Políticas PrudenVagas</p>
                <p>Políticas de Privacidade</p>
                <p>Programa de Aliados da PrudenVagas</p>
            </div>
            <div class="sociais">
                    <h3>SIGA-NOS</h3>
                    <div class="sociais-img">
                        <img src="assets/img/logo-instagram.png"><p>Instagram</p>
                    </div>
                    <div class="sociais-img">
                        <img src="assets/img/logo-twitter.png"><p>twitter</p>
                    </div>
                    <div class="sociais-img">
                        <img src="assets/img/logo-facebook.png"><p>Facebook</p>
                    </div>
                    <div class="sociais-img">
                        <img src="assets/img/logo-youtube.png"><p>Youtube</p>
                    </div>
                    <div class="sociais-img">
                        <img src="assets/img/logo-linkedln.png"><p>Linkedin</p>
                    </div>
                </div>
                <div class="downloads">
                    <h3>DOWNLOADS</h3>
                    <img src="assets/img/qr-code.png">
                    <img src="assets/img/playstore.png">
                    <img src="assets/img/Apple_Store.png">
                </div>
        </section>
        <div class="direito">
            <hr>
            <p>@ 2025 PrudenVagas. Todos os direitos acâdemicos reservados</p>
        </div>
    </footer>
</body>
</html>