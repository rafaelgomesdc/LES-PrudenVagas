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
    <script src="validacao.js" defer></script>
    <title>Suas vagas, só aqui na PrudenVagas</title>
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
    <nav>
        <img src="assets/img/1.png">
    </nav>
    <section class="centro">
        <div class="box">
            <div class="login-box">
                <h1>Entrar como Empresa</h1>
                <form method="POST" action="<?= base_url ?>public/index.php?action=login-pj">
                    <input type="text" placeholder="CNPJ (00.000.000/0000-00)" name="inputCNPJ" id="inputCNPJ" required maxlength="18">
                    <input type="password" id="senha" placeholder="Senha" name="inputSenha" required>
                    <br><br>
                    <button type="submit" id="botao">Entrar</button>
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