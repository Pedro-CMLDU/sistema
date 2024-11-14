<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico - Chaves, Reservas e Funcionários</title>
    <link rel="stylesheet" href="../css/estilo_historico.css">
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
        <div class="titulo">Histórico</div>

        <h3>Histórico Completo</h3>
        <?php
        require_once('../config/dbConnect.php');

        // Consulta SQL com correções
        $sql = "SELECT 
                    chave.descricao AS chave_descricao,
                    CASE 
                        WHEN chave.numero = 1 THEN 'Disponível'
                        WHEN chave.numero = 2 THEN 'Emprestada'
                    END AS chave_status,
                    registro.data_emp AS data_emp,
                    COALESCE(DATE_FORMAT(registro.data_dev, '%Y-%m-%d %H:%i:%s'), 'Pendente') AS data_dev,
                    func.nome AS func_nome,
                    tipo_func.tip_func AS func_cargo
                FROM 
                    chave
                JOIN 
                    registro ON chave.id = registro.id_chave
                JOIN 
                    func ON registro.id_func = func.id
                JOIN 
                    tipo_funcionario tipo_func ON func.cod_tip_func = tipo_func.codigo
                WHERE 
                    chave.numero IN (1, 2)"; // Exclui status indefinido

        $resultado = $dbh->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

        // Verificar se há registros a serem exibidos
        if (count($dados) > 0):
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Descrição da Chave</th>
                        <th>Status</th>
                        <th>Data de Empréstimo</th>
                        <th>Data de Devolução</th>
                        <th>Nome do Funcionário</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dados as $linha):
                    ?>
                        <tr>
                            <td><?= $linha['chave_descricao'] ?></td>
                            <td><?= $linha['chave_status'] ?></td>
                            <td><?= $linha['data_emp'] ?></td>
                            <td><?= $linha['data_dev'] ?></td>
                            <td><?= $linha['func_nome'] ?></td>
                            <td><?= $linha['func_cargo'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="imagem-vazia">
                <img src="../imagem/Vector.png" alt="Nenhum registro encontrado">
            </div>
        <?php endif; ?>
    </div>
</body>

</html>