<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservadas - Chaves</title>
    <link rel="stylesheet" href="../css/estilo_reservadas.css">
</head>

<body>
    <div class="retangulo-superior">
        <div class="keybox">
            <img src="../imagem/logo.png" alt="keybox">
        </div>
        <div class="imglogosenac">
            <img src="../imagem/image 7.png" alt="logosenac" class="img_senac_logo">
        </div>
    </div>

    <div class="container">
        <div class="titulo">Chaves Reservadas</div>

        <h3>Lista de Chaves Emprestadas</h3>
        <table>
            <thead>
                <tr>
                    <th>Descrição da Chave</th>
                    <th>Data de Empréstimo</th>
                    <th>Nome do Funcionário</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config/dbConnect.php');

                // Consulta SQL para exibir apenas chaves emprestadas
                $sql = "SELECT 
                            chave.descricao AS chave_descricao,
                            registro.data_emp AS data_emp,
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
                            chave.numero = 2"; // 2 = Status "Emprestada"

                $resultado = $dbh->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                if (count($dados) > 0):
                    foreach ($dados as $linha):
                ?>
                        <tr>
                            <td><?= $linha['chave_descricao'] ?></td>
                            <td><?= $linha['data_emp'] ?></td>
                            <td><?= $linha['func_nome'] ?></td>
                            <td><?= $linha['func_cargo'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                else:
                    ?>
                    <tr>
                        <td colspan="4">Nenhuma chave emprestada encontrada</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Exibe a imagem caso nenhuma chave esteja emprestada -->
    <?php if (count($dados) == 0): ?>
        <div class="block">
            <img src="../imagem/Vector.png" alt="Nenhuma chave emprestada">
        </div>
    <?php endif; ?>

</body>

</html>