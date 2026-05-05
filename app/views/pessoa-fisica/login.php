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
    
    <!-- Mantendo seu script de validação, caso exista na pasta pública -->
    <script src="validacao.js" defer></script>
    
    <title>Login Candidato - PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <!-- Certifique-se que a imagem PrudenVagas.png está em assets/img/ -->
                <img src="assets/img/PrudenVagas.png" alt="Logo PrudenVagas">
                <h1>PrudenVagas</h1>
            </div>
        </div>
    </header>

    <!-- Removido o nav com imagem genérica ou ajustado para seguir o padrão -->
    <nav>
        <img src="assets/img/1.png" alt="Banner Informativo">
    </nav>

    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Entrar como Candidato</h1>
                
                <!-- A rota action aponta corretamente para o seu roteador index.php -->
                <form method="POST" action="public/index.php?action=login-pf">
                    <input type="text" id="inputCPF" placeholder="CPF" name="inputCPF" required maxlength="14">
                    <input type="password" id="senha" placeholder="Senha" name="inputSenha" required>
                    
                    <br><br>
                    <button type="submit" id="botao">Entrar</button>
                </form>

                <div class="opcoes-login">
                    <br>
                    <p>Não tem uma conta? <a href="public/index.php?action=view-cadastrar-pf">Cadastre-se aqui</a></p>
                </div>
            </div>
        </div>
    </section>

    <div class="space-fix"></div>
    
    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acadêmicos reservados - FATEC</p>
        </div>
    </footer>

    <script>
        // Máscara simples para CPF no campo de login
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