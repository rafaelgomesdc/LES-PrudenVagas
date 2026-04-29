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
                    <input type="text" placeholder="Telefone" name="inputTelefone" require>
<!--
                    <select name="inputEnsino" id="selectOpcoes" onchange="gerenciarCampos()">
                        <option value="Nada">Escolha o Nível de Escolaridade</option>
                        <option value="FundInco">Ensino Fundamental Incompleto</option>
                        <option value="FundCom">Ensino Fundamental Completo</option>
                        <option value="MediIncom">Ensino Médio Incompleto</option>
                        <option value="MediCom">Ensino Médio Completo</option>
                        <option value="SupIncom">Superior Incompleto</option>
                        <option value="SupCom">Superior Completo</option>
                        <option value="PosGra">Pós-Graduação</option>
                    </select>

                    
                    <input type="text" id="campoOculto" style="display: none;" placeholder="Qual o Curso?" name="InputCurso_incom">
                    <input type="text" id="campoOculto2" style="display: none;" placeholder="instituição do curso" name="inputInsti_incom">
                    <input type="text" id="campoOculto3" style="display: none;" placeholder="Período do Curso" name="inputPerio_incom">
                    <label for="campoOculto4" class="label-data" style="display: none;">Data prevista para fim do Curso:</label>
                    <input type="date" id="campoOculto4" style="display: none;" placeholder="Data prevista para acabar" name="dataFim_incom">
                    

                    <input type="text" id="campoOculto01" style="display: none;" placeholder="Qual o Curso?" name="InputCurso_comp">
                    <input type="text" id="campoOculto02" style="display: none;" placeholder="instituição em que cursou" name="inputInsti_comp">
                    <label for="campoOculto03" class="label-data" style="display: none;">Data fim do Curso:</label>
                    <input type="date" id="campoOculto03" style="display: none;" placeholder="Data prevista para acabar" name="dataFim_comp">

                    <script>
                        const STYLE_VISIVEL = 'width: 60%; padding: 10px; margin: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;';
                        const STYLE_OCULTO = 'display: none;';

                        function gerenciarCampos() {
                            const select = document.getElementById('selectOpcoes');
                            const valorSelecionado = select.value;

                            const camposIncompleto = [
                                document.getElementById('campoOculto'),
                                document.getElementById('campoOculto2'),
                                document.getElementById('campoOculto3'),
                                document.getElementById('campoOculto4')
                            ];

                            const labelDataIncompleto = document.querySelector('label[for="campoOculto4"]');

                            const camposCompleto = [
                                document.getElementById('campoOculto01'),
                                document.getElementById('campoOculto02'),
                                document.getElementById('campoOculto03')
                            ];

                            const labelDataCompleto = document.querySelector('label[for="campoOculto03"]');

                            function atualizarExibicao(campos, label, deveMostrar) {
                                const style = deveMostrar ? STYLE_VISIVEL : STYLE_OCULTO;
                                campos.forEach(campo => {
                                    if (campo) {
                                        campo.style.cssText = style;
                                    }
                                });

                                if (label) {
                                    if (deveMostrar) {
                                        label.style.display = 'block';
                                        } else {
                                            label.style.display = 'none';
                                }
                }
                            }
                            
                            if (valorSelecionado === 'SupIncom') {
                                atualizarExibicao(camposIncompleto, labelDataIncompleto, true);
                                atualizarExibicao(camposCompleto, labelDataCompleto, false);
                                
                            } else if (valorSelecionado === 'SupCom' || valorSelecionado === 'PosGra') {
                                atualizarExibicao(camposCompleto, labelDataCompleto, true);
                                atualizarExibicao(camposIncompleto, labelDataIncompleto, false);
                                
                            } else {
                                atualizarExibicao(camposIncompleto, labelDataIncompleto, false);
                                atualizarExibicao(camposCompleto, labelDataCompleto, false);
                            }
                        }
                    </script>
-->                    
                    <input type="email" placeholder="Email" name="inputEmail" required>
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