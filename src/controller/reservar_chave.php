<?php
require_once('../../config/dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Captura os dados do formulário
    $id = filter_input(INPUT_POST, 'funcionario');
    $data = filter_input(INPUT_POST, 'data');
    $hora = filter_input(INPUT_POST, 'hora');
    $sala = filter_input(INPUT_POST, 'sala');

    try {
        // Insere o registro com `data_dev` como NULL
        $sqlRegistro = "INSERT INTO registro (data_emp, data_dev, id_chave, id_func) VALUES (:data_emp, NULL, :id_chave, :id_func)";
        $stmtRegistro = $dbh->prepare($sqlRegistro);

        // Insere a data e hora juntos como `data_emp`
        $dataEmp = "$data $hora";
        $dataFormatada = DateTime::createFromFormat('d/m/Y H:i', "$data $hora");
        $dataEmp = $dataFormatada->format('Y-m-d H:i:s');
        $stmtRegistro->bindValue(':data_emp', $dataEmp);
        $stmtRegistro->bindValue(':id_chave', $sala); // Substitua por uma consulta real para obter o ID correto da chave
        $stmtRegistro->bindValue(':id_func', $id); // Substitua por uma consulta real para obter o ID correto do funcionário

        if ($stmtRegistro->execute()) {
            header("Location: ../../views/retirar_chave.php?sucesso=1");
        } else {
            header("Location: ../../views/retirar_chave.php?erro=0");
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    header("Location: ../../views/retirar_chave.php");
}