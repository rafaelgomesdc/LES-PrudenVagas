<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url ?>">
    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <title>Cadastro Candidato</title>
    <style>
        /* Estilos básicos para os feedbacks de validação */
        .mensagem-erro { color: red; background-color: #fee; border: 1px solid red; padding: 10px; margin-bottom: 15px; border-radius: 4px; display: none; }
        .mensagem-sucesso { color: green; background-color: #efe; border: 1px solid green; padding: 10px; margin-bottom: 15px; border-radius: 4px; display: none; }
        .campo-erro { border: 2px solid red !important; }
        .campo-sucesso { border: 2px solid green !important; }
        #status-cpf { font-size: 12px; margin-top: -10px; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>
    <header>
        <img class="logo" src="assets/img/PrudenVagas.png" alt="">
        <div>
            <a href="" target="_self"><h1>PrudenVagas</h1></a>
            <a href="" target="_self"><h1>Sair</h1></a>
        </div>
    </header>

    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Candidato</h1>

                <div id="mensagem-geral-erro" class="mensagem-erro"></div>
                <div id="mensagem-geral-sucesso" class="mensagem-sucesso"></div>

                <form id="formCadastro" method="POST" action="<?= base_url ?>public/index.php?action=cadastrar-pf" enctype="multipart/form-data">
                    <input type="text" placeholder="Nome" name="inputNome" required>
                    <input type="text" placeholder="Sobrenome" name="inputSobrenome" required>
                    
                    <input type="text" placeholder="CPF" name="inputCPF" id="inputCPF" required maxlength="14">
                    <span id="status-cpf"></span>

                    <input type="text" placeholder="RG" name="inputRG" required>
                    <label for="Data" style="display: block;">Data de Nascimento:</label>
                    <input type="date" id="Data" name="inputDataNasc" required>
                    <input type="text" placeholder="Telefone" name="inputTelefone" required>
                    
                    <input type="email" placeholder="Email" name="inputEmail" required>
                    <input type="password" placeholder="Senha" name="inputSenha" required>
                    
                    <br>
                    <label for="input-upload-imagem" class="custom-file-upload">Escolher Foto de Perfil</label>
                    <input type="file" id="input-upload-imagem" name="fotoPerfil" accept="image/*">
                    <br><br>

                    <input type="submit" id="btnEnviar" value="Cadastrar">
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
    <script>
        document.getElementById('inputCPF').addEventListener('blur', function() {
            const cpf = this.value.replace(/\D/g, ''); // Remove formatação
            const statusSpan = document.getElementById('status-cpf');
            const campoCpf = this;
            const btnEnviar = document.getElementById('btnEnviar');

            // Limpa estados anteriores
            statusSpan.textContent = '';
            statusSpan.style.color = '';
            campoCpf.classList.remove('campo-erro', 'campo-sucesso');
            btnEnviar.disabled = false;

            if (cpf.length === 11) {
                statusSpan.textContent = 'Validando CPF...';
                statusSpan.style.color = 'blue';
            }

        // Formatação simples do CPF (XXX.XXX.XXX-XX) enquanto digita
        document.getElementById('inputCPF').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, "$1.$2.$3-$4");
            } else if (value.length > 6) {
                value = value.replace(/^(\d{3})(\d{3})(\d{1,3})$/, "$1.$2.$3");
            } else if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d{1,3})$/, "$1.$2");
            }
            e.target.value = value;
        });
    </script>
</body>
</html>