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