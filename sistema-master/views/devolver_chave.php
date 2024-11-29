<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keybox - Devolver Chave</title>
    <link rel="stylesheet" href="../css/devolver_chave.css">
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

    <nav class="breadcrumb">
        <a href="index_menu.php">Início</a> > <a href="#">Devolver</a>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Devolver Chave</h2>
            <!-- Tabela com as informações do banco de dados -->
            <table>
                <thead>
                    <tr>
                        <th>ID Registro</th>
                        <th>Funcionário</th>
                        <th>Chave</th>
                        <th>Data de Empréstimo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../config/dbConnect.php');

                    // Consulta para selecionar os registros sem data de devolução
                    $sql = "
                        SELECT registro.id AS registro_id, func.nome AS funcionario, chave.descricao AS chave, registro.data_emp
                        FROM registro
                        JOIN func ON registro.id_func = func.id
                        JOIN chave ON registro.id_chave = chave.id
                        WHERE registro.data_dev IS NULL
                    ";
                    $resultado = $dbh->query($sql);
                    $registros = $resultado->fetchAll(PDO::FETCH_ASSOC);

                    if (count($registros) > 0):
                        foreach ($registros as $registro):
                    ?>
                            <tr>
                                <td><?= $registro['registro_id'] ?></td>
                                <td><?= $registro['funcionario'] ?></td>
                                <td><?= $registro['chave'] ?></td>
                                <td class="data-emp"><?= $registro['data_emp'] ?></td>
                                <td class="botao-devolver">
                                    <a href="../src/controller/devolvendo_chave.php?<?= $registro['registro_id'] ?>" class="devolver"> Devolver </a>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <tr>
                            <td colspan="5">Nenhuma chave para devolução</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>