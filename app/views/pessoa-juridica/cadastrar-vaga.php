<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

<<<<<<< HEAD
    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
=======
    <!-- Linkagem de CSS seguindo o padrão das suas pastas -->
    <link rel="stylesheet" href="style/style-base.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-cadastrar.css">
>>>>>>> 2dfb2baeadf97681f67c1a297dafdfc9fdda42f9
    
    <title>Cadastrar Nova Vaga - PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
<<<<<<< HEAD
                <img src="assets/img/PrudenVagas.png">
                <h1>PrudenVagas</h1>
            </div>
            <h2><a href="<?= base_url ?>public/index.php?action=logout-pj">Sair</a></h2>
=======
                <img src="assets/img/PrudenVagas.png" alt="Logo">
                <h1>PrudenVagas</h1>
            </div>
            <!-- Link de saída funcional usando sua rota de logout -->
            <h2><a href="public/index.php?action=logout-pj">Sair</a></h2>
>>>>>>> 2dfb2baeadf97681f67c1a297dafdfc9fdda42f9
        </div>
    </header>
    </header>

    <nav>
        <ul>
            <a href="public/index.php?action=banco-talentos"><li>Banco de Talentos</li></a>
            <a href="public/index.php?action=gerenciar-vagas"><li>Suas Vagas</li></a>
            <a href="public/index.php?action=view-perfil-pj"><li>Perfil da Empresa</li></a>
        </ul>
    </nav>

    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Vaga</h1>
                <!-- O action aponta para o método Cadastrar do seu VagasController -->
                <form method="POST" action="public/index.php?action=cadastrar-vaga" enctype="multipart/form-data">
                    <input type="text" placeholder="Nome da Vaga" name="nome" required>
                    <input type="text" placeholder="Função (Ex: Desenvolvedor Junior)" name="funcao" required>
                    <textarea placeholder="Descrição detalhada da vaga" name="descricao" rows="4" style="width: 100%; margin-bottom: 10px; border-radius: 5px; padding: 10px; border: 1px solid #ccc;"></textarea>
                    
                    <input type="number" placeholder="Pagamento (Salário)" name="pagamento" required>
                    <input type="number" placeholder="Quantidade de Vagas" name="quantidade" required>
                    
                    <br>
                    <label>Imagem de destaque da vaga:</label>
                    <br>
                    <label for="file-upload" class="custom-file-upload">Escolher arquivo</label>
                    <input id="file-upload" type="file" name="foto_vaga" style="display:none;">  
                    <span id="file-name" style="font-size: 0.8em; color: #666;">Nenhum arquivo escolhido</span>
                    
                    <br><br>
<<<<<<< HEAD
                    <button type="submit" id="botao">CADASTRAR</button>
=======
                    <button type="submit" class="submit">CADASTRAR VAGA</button>
>>>>>>> 2dfb2baeadf97681f67c1a297dafdfc9fdda42f9
                </form>
            </div>
        </div>
    </section>
    
    <footer>
<<<<<<< HEAD
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
=======
        <div class="rodape">
            <div class="atendimento">
                <h3>ATENDIMENTO</h3>
                <a href="#">Central de Ajuda</a>
                <a href="#">Fale Conosco</a>
                <a href="#">Ouvidoria</a>
            </div>
            <div class="sobre">
                <h3>INSTITUCIONAL</h3>
                <a href="#">Sobre a PrudenVagas</a>
                <a href="#">Políticas de Privacidade</a>
                <a href="#">Termos de Uso</a>
            </div>
            <div class="pag">
                <h3>FORMAS DE PAGAMENTO</h3>
                <div class="formas">
                    <img style="width: 45px;" src="assets/img/pix-bc-logo-2048x726.png">
                    <img style="width: 40px;" src="assets/img/Visa-Logo-700x394.png">
                    <img style="width: 40px;" src="assets/img/MasterCard_Logo.svg.png">
                </div>
            </div>
            <div class="sociais">
                <h3>REDES SOCIAIS</h3>
                <div class="sociais-img">
                    <img src="assets/img/logo-instagram.png"><p>Instagram</p>
                </div>
                <div class="sociais-img">
                    <img src="assets/img/logo-linkedln.png"><p>Linkedin</p>
                </div>
            </div>
        </div>
        <div class="direitos">
            <hr>
            <p>@ 2026 PrudenVagas. Projeto Acadêmico FATEC Presidente Prudente.</p>
>>>>>>> 2dfb2baeadf97681f67c1a297dafdfc9fdda42f9
        </div>
    </footer>

    <script>
        // Script para atualizar o nome do arquivo selecionado na tela
        document.getElementById('file-upload').onchange = function () {
            document.getElementById('file-name').innerHTML = this.files[0].name;
        };
    </script>
</body>
</html>