<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fucionario_chaveamento.css">
    <title>Chave</title>
</head>
<body>
    <div class="retangulo-superior">
        <div class="keybox">
            <img src="../imagem/logo.png" alt="keybox">
        </div>
        <div class="imglogosenac">
            <img src="../imagem/logosenac.png" alt="logosenac" class="img_senac_logo">
        </div>
    </div>
    
    <nav class="navegacao">
        <a href="index_menu.php">Início</a> &gt;
        <a href="fucionario.php">Voltar</a>
    </nav>

    <section class="blocomeio">
        <div class="input-pesquisa">
            <img src="../imagem/lupa.png" alt="lupa">
            <input type="search" name="" id="" placeholder="Pesquisa" class="pesquisa">
        </div>        
    </section>

    <section class="blocoprincipal">
        <div class="input-chave">
            <img src="../imagem/lupa.png" alt="lupa">
            <button type="submit" name="" id="" class="chave"> Chave (<?php echo count($chaves); ?>) </button>
            <img src="../imagem/interrogacao.png" alt="interrogação" class="img-interrogação">
        </div>

        <!-- Lista de Chaves -->
        <?php if (count($chaves) > 0): ?>
            <table class="tabela-chaves">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Número</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chave as $chave): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($chave['id']); ?></td>
                            <td><?php echo htmlspecialchars($chave['descricao']); ?></td>
                            <td><?php echo htmlspecialchars($chave['numero']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem-vazia">Nenhuma chave cadastrada.</p>
        <?php endif; ?>
    </section>
</body>
</html>