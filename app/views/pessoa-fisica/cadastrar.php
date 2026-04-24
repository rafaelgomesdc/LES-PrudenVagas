<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-cadastrar.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <script src="validacao.js" defer></script>
    <title>Cadastro Candidato</title>
</head>
<body>
    <header>
        <img class="logo" src="assets/img/PrudenVagas.png" alt="">
        <div>
            <a href="" target="_self"><h1>PrudenVagas</h1></a>
            <a href="" target="_self"><h1>Sair</h1></a>
            </div>
        </div>
    </header>

    <nav>
        <img src="assets/img/1.png">
    </nav>
    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Cadastrar Candidato</h1>
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="text" placeholder="Nome" name="inputNome" required>
                    <input type="text" placeholder="Sobrenome" name="inputSobrenome" required>
                    <input type="text" placeholder="CPF" name="inputCPF" required>
                    <input type="text" placeholder="RG" name="inputRG" required>
                    <label for="Data" style="display: block;">Data de Nascimento:</label>
                    <br>
                    <input type="date" id="Data" placeholder="Data Nascimento" name="inputDataNasc">
                    <input type="text" placeholder="Telefone" name="inputTelefone">
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

                    <input type="text" placeholder="Email" name="inputEmail" required>
                    <input type="password" placeholder="Senha" name="inputSenha" required>
                    <br>
                    <label for="o">Selecionar foto de perfil:</label>
                    <br>
                    <label for="input-upload-imagem" id="o" class="custom-file-upload">Escolher Currículo</label>
                    <input type="file" id="input-upload-imagem" accept="image/*">  
                    <span id="file-name">Nenhum arquivo escolhido</span>
                    <br><br>
                    <input type="hidden" name="acao" value="CadastrarPessoaFisica">
                    <input id="botao" type="submit" value="Cadastrar">
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
</body>
</html>