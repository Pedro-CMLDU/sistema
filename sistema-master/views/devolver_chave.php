<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keybox - Devolver Chave</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
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
    <h1 class="titulo-principal">Devolver Chave</h1>
        <!-- Tabela com as informações do banco de dados -->
        <section class="secao-tabela">
            <table id="tabela" class="display tabela-principal">
                <thead>
                    <tr>
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
                        SELECT registro.id AS registro_id, func.nome AS funcionario, chave.descricao AS chave, registro.data_emp, chave.id AS chave_id
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
                                <td><?= $registro['funcionario'] ?></td>
                                <td><?= $registro['chave'] ?></td>
                                <td class="data-emp"><?= $registro['data_emp'] ?></td>
                                <td class="botao-devolver">
                                    <a href="../src/controller/devolvendo_chave.php?registro_id=<?= $registro['registro_id'] ?>" class="devolver"> Devolver </a>
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
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabela').DataTable({
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                    }
                });
            });
        </script>
</body>

</html>