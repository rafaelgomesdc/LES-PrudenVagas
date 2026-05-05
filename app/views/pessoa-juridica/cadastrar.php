<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?= base_url ?>">
    
    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">

    <title>Cadastro Empresa - PrudenVagas</title>
    <style>
        /* Estilos para feedback de validação */
        .campo-erro { border: 2px solid #e74c3c !important; }
        #status-cnpj { font-size: 12px; margin-bottom: 10px; display: block; color: #666; }
        input[readonly] { background-color: #f0f0f0; cursor: not-allowed; }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png" alt="Logo">
                <h1>PrudenVagas</h1>
            </div>
            <!-- Link para voltar ao login caso o usuário tenha clicado errado -->
            <h2><a href="public/index.php?action=view-login">Voltar</a></h2>
        </div>
    </header>

    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Empresa</h1>

                <!-- Action apontando para a função de processamento no Controller -->
                <form id="formCadastro" method="POST" action="public/index.php?action=cadastrar-pj">
                    
                    <input type="text" placeholder="Razão Social" name="inputRazaoSocial" required>
                    <input type="text" placeholder="Nome Fantasia" name="inputNomeFantasia" required>
                    
                    <input type="text" placeholder="CNPJ (00.000.000/0000-00)" name="inputCNPJ" id="inputCNPJ" required maxlength="18">
                    <span id="status-cnpj">Digite um CNPJ válido</span>

                    <input type="text" placeholder="Inscrição Estadual" name="inputIE">
                    <input type="text" placeholder="Telefone Comercial" name="inputTelefone" required>
                    <input type="text" placeholder="Categoria" name="inputCategoria" required>

                    <div style="display: flex; gap: 5px;">
                        <input type="text" name="inputCEP" id="cep" placeholder="CEP" maxlength="9" required style="width: 40%;">
                        <p style="font-size: 10px; align-self: center;">(Preenchimento automático)</p>
                    </div>

                    <input type="text" name="inputLogradouro" id="logradouro" placeholder="Logradouro" readonly>
                    <input type="text" name="inputBairro" id="bairro" placeholder="Bairro" readonly>
                    <input type="text" name="inputCidade" id="cidade" placeholder="Cidade" readonly>
                    <input type="text" name="inputEstado" id="estado" placeholder="Estado" readonly>
                    
                    <input type="email" placeholder="Email Comercial" name="inputEmailEmpresa" required>
                    <input type="password" placeholder="Senha de Acesso" name="inputSenhaEmpresa" required>
                    
                    <br>
                    <button type="submit" class="submit" id="botao">FINALIZAR CADASTRO</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Projeto Acadêmico FATEC Presidente Prudente.</p>
        </div>
    </footer>

    <script>
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

        document.getElementById('inputCNPJ').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 14) value = value.slice(0, 14);
            
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

            const status = document.getElementById('status-cnpj');
            if (value.length === 18) {
                status.innerHTML = "Formato correto";
                status.style.color = "green";
            } else {
                status.innerHTML = "Aguardando CNPJ completo...";
                status.style.color = "#666";
            }
        });
    </script>
</body>
</html>