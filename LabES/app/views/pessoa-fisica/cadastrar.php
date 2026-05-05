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
    <title>Suas vagas, só aqui na PrudenVagas</title>
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
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png">
                <h1>PrudenVagas</h1>
            </div>
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
                    <br>
                    <input type="date" id="Data" placeholder="Data Nascimento" name="inputDataNasc" require>
                    <input type="email" placeholder="Email" name="inputEmail" require>
                    <input type="text" placeholder="Telefone" name="inputTelefone" require>
                    <input type="text" placeholder="Biografia" name="inputBiografia">
                    <div class="cep" style="display: flex; gap: 5px;">
                        <input type="text" name="cep" id="cep" placeholder="CEP" maxlength="9" required style="width: 40%;">
                        <p style="font-size: 10px; align-self: center;">(Preenchimento automático)</p>
                    </div>
                    <input type="text" name="logradouro" id="logradouro" placeholder="Logradouro" readonly>
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" readonly>
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" readonly>
                    <input type="text" name="estado" id="estado" placeholder="Estado" readonly>

                    <input type="password" placeholder="Senha" name="inputSenha" required>
                    
                    <br>
                    <label for="input-upload-imagem" class="custom-file-upload">Escolher Foto de Perfil</label>
                    <input type="file" id="input-upload-imagem" name="fotoPerfil" accept="image/*">
                    <br><br>

                    <input type="submit" id="botao" value="Cadastrar">
                </form>
            </div>
        </div>
    </section>

    <div class="space-fix"></div>
    
    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
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
        });
        
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

        // Lógica de busca de CEP (ViaCEP)
        document.getElementById('cep').addEventListener('blur', function() {
            let cep = this.value.replace(/\D/g, '');
            
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('logradouro').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('estado').value = data.uf;
                            this.classList.remove('campo-erro');
                        } else {
                            alert("CEP não encontrado.");
                            this.classList.add('campo-erro');
                        }
                    })
                    .catch(error => console.error('Erro na API ViaCEP:', error));
            }
        });
    </script>
</body>
</html>