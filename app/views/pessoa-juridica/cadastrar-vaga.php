<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>-->

    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-base.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-cadastrar.css">
    
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
            <a href="homepage.html"><li>Home</li></a>
            <a href="mural-vagas.html"><li>Mural de Vagas</li></a>
            <a href="#"><li>Empresas</li></a>
            <a href="perfil-candidato.html"><li>Perfil do Candidato</li></a>
            <li class="nav-element-drop">
                <a href="#">Cadastrar</a>
                <div class="nav-element-drop-content">
                    <a href="">Link 1</a>
                    <a href="">Link 2</a>
                    <a href="">Link 3</a>
                </div>
            </li>
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
                    <button type="submit" class="submit">CADASTRAR</button>
                </form>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="rodape">
            <div class="atendimento">
                <h3>ATENDIMENTO AO CLIENTE</h3>
                <a href="#">Central de Ajuda</a>
                <a href="#">Como comprar</a>
                <a href="#">Métodos de Paramento</a>
                <a href="#">Garantia Xhopii</a>
                <a href="#">Devolução e Reembolso</a>
                <a href="#">Fale Conosco</a>
                <a href="#">Ouridoria</a>
            </div>
            <div class="sobre">
                <h3>SOBRE A XHOPII</h3>
                <a href="#">Sobre Nós</a>
                <a href="#">Políticas Xhopii</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">Programa de Ailiados da Xhopii</a>
                <a href="#">Seja um Entregador Xhopii</a>
                <a href="#">Ofertas Relâmpago</a>
                <a href="#">Xhopii Blog</a>
                <a href="#">Impresa</a>
            </div>
            <div class="pag">
                <h3>PAGAMENTO</h3>
                <div class="formas">
                    <img style="width: 60px;" src="assets/img/pix-bc-logo-2048x726.png">
                    <img src="assets/img/boleto-logo-4.png">
                    <img src="assets/img/american.png">
                    <img src="assets/img/Visa-Logo-700x394.png">
                    <img src="assets/img/MasterCard_Logo.svg.png">
                    <img src="assets/img/logo-hipercard.png">
                    <img src="assets/img/logo-elo.png">
                </div>
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
                <a href="#"><img src="assets/img/qr-code.png"></a>
                <a href="#"><img src="assets/img/playstore.png"></a>
                <a href="#"><img src="assets/img/Apple_Store.png"></a>
            </div>
        </div>
        <div class="direitos">
            <p>@ 2023 Xhopii. Todos os direitos acadêmicos reservados</p>
        </div>
    </footer>
</body>
</html>