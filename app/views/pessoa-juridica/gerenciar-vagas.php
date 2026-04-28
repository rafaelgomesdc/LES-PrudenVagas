<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">

    <title>PrudenVagas</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="identidade">
                <img src="assets/img/PrudenVagas.png">
                <h1>PrudenVagas</h1>
            </div>
            <h2><a href="<?= base_url ?>public/index.php?action=logout-pj">Sair</a></h2>
        </div>
    </header>

    <nav>
        <ul>
            <a href="banco-talentos.html"><li>Banco de Talentos</li></a>
            <a href="<?= base_url ?>public/index.php?action=gerenciar-vagas"><li>Suas Vagas</li></a>
            <a href="perfil-empresa.html"><li>Perfil da Empresa</li></a>
        </ul>
    </nav>

    <section class="cantro">
        <div class="box">
            <table border="1">
                <tr>
                    <th>Cod</th>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Descrição</th>
                    <th>Pagamento</th>
                    <th>Quantidade de Vagas</th>
                </tr>
                <?php foreach ($vagas as $v): ?>
                <tr>
                        <td><?= $v['codigo'] ?></td>
                        <td><?= $v['nome'] ?></td>
                        <td><?= $v['funcao'] ?></td>
                        <td><?= $v['descricao'] ?></td>
                        <td><?= $v['pagamento'] ?></td>
                        <td><?= $v['quantidade'] ?></td>
                        <td>
                            <a href="?action=edit&cod=<?= $v['codigo'] ?>">Editar</a>
                            <a href="?action=delete&cod=<?= $v['codigo'] ?>">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= base_url ?>public/index.php?action=view-cadastrar-vaga">Adicionar Vaga</a>
    </section>
    
    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
        </div>
    </footer>
</body>
</html>