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
            <a href="#"><li>Home</li></a>
            <a href="#"><li>Banco de Talentos</li></a>
            <a href="gerenciar-vagas.html"><li>Suas Vagas</li></a>
            <a href="perfil-empresa.html"><li>Perfil da Empresa</li></a>
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