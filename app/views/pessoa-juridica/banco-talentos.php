<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <link rel="stylesheet" href="style/style-table.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">

    <title>PrudenVagas</title>
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
            <?php if (!empty($candidatos)): ?>
                <?php foreach ($candidatos as $candidato): ?>
                    <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <thead>
                            <tr style="background-color: #f4f4f4;">
                                <th>Nome</th>
                                <th>Data Nascimento</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($candidatos as $v): ?>
                            <tr>
                                <td><?= htmlspecialchars($v['nome']) ?></td>
                                <td><?= htmlspecialchars($v['data_nasc']) ?></td>
                                <td><?= htmlspecialchars($v['telefone']) ?></td>
                                <td><?= htmlspecialchars($v['email']) ?></td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum candidato encontrado no momento.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acâdemicos reservados.</p>
        </div>
    </footer>
</body>
</html>