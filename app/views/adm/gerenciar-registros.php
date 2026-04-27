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
            <a href="banco-talentos.html"><li>Banco de Talentos</li></a>
            <a href="#"><li>Suas Vagas</li></a>
            <a href="perfil-empresa.html"><li>Perfil da Empresa</li></a>
            <li class="nav-element-drop">
                <a href="#">Cadastrar</a>
                <div class="nav-element-drop-content">
                    <a href="<?= base_url ?>public/index.php?action=view-cadastrar-pj">Empresa</a>
                    <a href="<?= base_url ?>public/index.php?action=view-cadastrar-pf">Candidato</a>
                </div>
            </li>
        </ul>
    </nav>

    <section class="cantro">
        <br>
        <div class="box">
            <table border="1">
                <tr>
                    <th>CNPJ</th>
                    <th>Razão Social</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Categoria</th>
                </tr>
                <?php foreach ($pessoas_juridicas as $pj): ?>
                <tr>
                        <td><?= $pj['cnpj'] ?></td>
                        <td><?= $pj['razao_social'] ?></td>
                        <td><?= $pj['email'] ?></td>
                        <td><?= $pj['telefone'] ?></td>
                        <td><?= $pj['categoria'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <br>
        <div class="box">
            <table border="1">
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>RG</th>
                    <th>Data Nascimento</th>
                    <th>Telefone</th>
                </tr>
                <?php foreach ($pessoas_fisicas as $pf): ?>
                <tr>
                        <td><?= $pf['cpf'] ?></td>
                        <td><?= $pf['nome'] ?></td>
                        <td><?= $pf['sobrenome'] ?></td>
                        <td><?= $pf['rg'] ?></td>
                        <td><?= $pf['data_nasc'] ?></td>
                        <td><?= $pf['telefone'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <br>
        <div class="box">
            <table border="1">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Descrição</th>
                    <th>Pagamento</th>
                    <th>Candidatos</th>
                    <th>Empresa</th>
                </tr>
                <?php foreach ($vagas as $v): ?>
                <tr>
                        <td><?= $v['cod'] ?></td>
                        <td><?= $v['nome'] ?></td>
                        <td><?= $v['funcao'] ?></td>
                        <td><?= $v['descricao'] ?></td>
                        <td><?= $v['pagamento'] ?></td>
                        <td><?= $v['candidatos'] ?></td>
                        <td><?= $v['empresa'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
    <br>
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