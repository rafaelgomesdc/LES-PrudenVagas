<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url ?>">
    <link rel="stylesheet" href="style/style-cadastrar.css">
    <title>Cadastro Empresa</title>
    <style>
        /* Estilos básicos para feedbacks */
        .mensagem-erro { color: red; background-color: #fee; padding: 10px; margin-bottom: 15px; display: none; }
        .campo-erro { border: 2px solid red !important; }
        .campo-sucesso { border: 2px solid green !important; }
        #status-cnpj { font-size: 12px; margin-top: -10px; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>
    <header>
        <img class="logo" src="assets/img/PrudenVagas.png" alt="Logo">
        <h1>PrudenVagas - Cadastro de Empresa</h1>
    </header>

    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Empresa</h1>

                <form id="formCadastro" method="POST" action="<?= base_url ?>public/index.php?action=cadastrar-pj">
                    <input type="text" placeholder="Razão Social" name="inputRazaoSocial" required>
                    <input type="text" placeholder="Nome Fantasia" name="inputNomeFantasia" required>
                    
                    <input type="text" placeholder="CNPJ (00.000.000/0000-00)" name="inputCNPJ" id="inputCNPJ" required maxlength="18">
                    <span id="status-cnpj"></span>

                    <input type="text" placeholder="Inscrição Estadual" name="inputIE">
                    <input type="text" placeholder="Telefone Comercial" name="inputTelefone" required>
                    
                    <input type="email" placeholder="Email Comercial" name="inputEmail" required>
                    <input type="password" placeholder="Senha" name="inputSenha" required>
                    
                    <input type="submit" id="btnEnviar" value="Cadastrar Empresa">
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
        document.getElementById('inputCNPJ').addEventListener('blur', function() {
            const cnpj = this.value.replace(/\D/g, ''); // Remove formatação
            const statusSpan = document.getElementById('status-cnpj');
            const campoCnpj = this;
            const btnEnviar = document.getElementById('btnEnviar');

            // Limpa estados anteriores
            statusSpan.textContent = '';
            statusSpan.style.color = '';
            campoCnpj.classList.remove('campo-erro', 'campo-sucesso');
            btnEnviar.disabled = false;

            if (cnpj.length === 14) {
                statusSpan.textContent = 'Validando CNPJ na Receita Federal...';
                statusSpan.style.color = 'blue';

                // Faz a requisição AJAX para o backend (Endpoint de CNPJ)
                fetch('<?= base_url ?>api/validar_cnpj.php?cnpj=' + cnpj)
                    .then(response => response.json())
                    .then(data => {
                        if (data.valido) {
                            statusSpan.textContent = '✓ ' + data.mensagem;
                            statusSpan.style.color = 'green';
                            campoCnpj.classList.add('campo-sucesso');
                        } else {
                            statusSpan.textContent = '✕ ' + data.mensagem;
                            statusSpan.style.color = 'red';
                            campoCnpj.classList.add('campo-erro');
                            btnEnviar.disabled = true; // Impede o envio
                        }
                    })
                    .catch(error => {
                        console.error('Erro na validação:', error);
                        statusSpan.textContent = 'Erro ao conectar com o serviço de validação.';
                        statusSpan.style.color = 'orange';
                    });
            } else if (cnpj.length > 0) {
                statusSpan.textContent = '✕ CNPJ deve conter 14 dígitos.';
                statusSpan.style.color = 'red';
                campoCnpj.classList.add('campo-erro');
            }
        });

        // Formatação/Máscara do CNPJ (00.000.000/0000-00) enquanto digita
        document.getElementById('inputCNPJ').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove não números
            
            // Limita a 14 dígitos
            if (value.length > 14) value = value.slice(0, 14);
            
            // Aplica a máscara progressivamente
            if (value.length > 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, "$1.$2.$3/$4-$5");
            } else if (value.length > 8) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,4})$/, "$1.$2.$3/$4");
            } else if (value.length > 5) {
                value = value.replace(/^(\d{2})(\d{3})(\d{1,3})$/, "$1.$2.$3");
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d{1,3})$/, "$1.$2");
            }
            e.target.value = value;
        });
    </script>
</body>
</html>