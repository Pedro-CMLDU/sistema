<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves Disponíveis</title>
    <link rel="stylesheet" href="../css/estilo_reservadas.css">
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

    <div class="container">
        <div class="titulo">Chaves Disponíveis</div>

        <h3>Lista de Chaves Disponíveis</h3>
        <?php
        require_once('../config/dbConnect.php');

        // Consulta para listar apenas as chaves disponíveis (numero = 1)
        $sql = "SELECT 
                    descricao AS chave_descricao
                FROM 
                    chave
                WHERE 
                    numero = 1"; // 1 = Disponível

        $resultado = $dbh->query($sql);
        $chavesDisponiveis = $resultado->fetchAll(PDO::FETCH_ASSOC);

        // Verificar se há chaves disponíveis
        if (count($chavesDisponiveis) > 0):
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Descrição da Chave</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($chavesDisponiveis as $chave):
                    ?>
                        <tr>
                            <td><?= $chave['chave_descricao'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="imagem-vazia">
                <img src="../imagem/Vector.png" alt="Nenhuma chave disponível">
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
