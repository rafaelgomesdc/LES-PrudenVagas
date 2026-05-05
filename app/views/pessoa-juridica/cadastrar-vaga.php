<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
    
    <title>Cadastrar Nova Vaga - PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png" alt="Logo">
                <h1>PrudenVagas</h1>
            </div>
            <h2><a href="public/index.php?action=logout-pj">Sair</a></h2>
        </div>
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
                    <!--<input type="text" placeholder="Descrição detalhada da vaga" name="descricao" rows="4">-->
                    <textarea placeholder="Descrição detalhada da vaga" name="descricao" rows="4"></textarea>
                    
                    <input type="number" placeholder="Pagamento (Salário)" name="pagamento" required>
                    <input type="number" placeholder="Quantidade de Vagas" name="quantidade" required>
                    
                    <br>
                    <label>Imagem de destaque da vaga:</label>
                    <br>
                    <label for="file-upload" class="custom-file-upload">Escolher arquivo</label>
                    <input id="file-upload" type="file" name="foto_vaga" style="display:none;">  
                    <span id="file-name" style="font-size: 0.8em; color: #666;">Nenhum arquivo escolhido</span>
                    
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

    <script>
        // Script para atualizar o nome do arquivo selecionado na tela
        document.getElementById('file-upload').onchange = function () {
            document.getElementById('file-name').innerHTML = this.files[0].name;
        };
    </script>
</body>
</html>