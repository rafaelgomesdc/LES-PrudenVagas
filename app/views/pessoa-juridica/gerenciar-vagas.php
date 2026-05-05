<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="<?= base_url ?>">

    <!-- Mantendo a padronização de estilos que você já usa -->
     <link rel="stylesheet" href="style/style-table.css">
    <link rel="stylesheet" href="style/style-header.css">
    <link rel="stylesheet" href="style/style-base.css">
    <link rel="stylesheet" href="style/style-gerenciar.css">

    <title>Gerenciar Suas Vagas - PrudenVagas</title>
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
            <h1>Suas Vagas Anunciadas</h1>
            
            <?php if (!empty($vagas)): ?>
                <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background-color: #f4f4f4;">
                            <th>Cod</th>
                            <th>Nome</th>
                            <th>Função</th>
                            <th>Descrição</th>
                            <th>Pagamento</th>
                            <th>Qtd</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vagas as $v): ?>
                        <tr>
                            <td><?= htmlspecialchars($v['codigo']) ?></td>
                            <td><?= htmlspecialchars($v['nome']) ?></td>
                            <td><?= htmlspecialchars($v['funcao']) ?></td>
                            <td><?= htmlspecialchars(substr($v['descricao'], 0, 50)) ?>...</td>
                            <td>R$ <?= number_format($v['pagamento'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($v['quantidade']) ?></td>
                            <td>
                                <!-- Links ajustados para passar o ID via URL para o Controller -->
                                <a href="public/index.php?action=edit-vaga&cod=<?= $v['codigo'] ?>" style="color: blue;">Editar</a> | 
                                <a href="public/index.php?action=delete-vaga&cod=<?= $v['codigo'] ?>" 
                                   style="color: red;" 
                                   onclick="return confirm('Tem certeza que deseja excluir esta vaga?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="margin-top: 20px;">Você ainda não cadastrou nenhuma vaga.</p>
            <?php endif; ?>

            <a href="public/index.php?action=view-cadastrar-vaga" id="botao">+ Adicionar Nova Vaga</a>
        </div>
    </section>
    
    <footer>
        <div class="direitos">
            <p>@ 2026 PrudenVagas. Todos os direitos acadêmicos reservados - FATEC.</p>
        </div>
    </footer>
</body>
</html>