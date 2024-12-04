<?php
require_once('../../config/dbConnect.php');

date_default_timezone_set('America/Recife');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id_chave = $_GET['registro_id'];

    $data_hora_atual = date("Y-m-d H:i:s");

    $devolver_chave = "UPDATE registro SET data_dev = :data_atual WHERE id = :id_registro";
    $req = $dbh->prepare($devolver_chave);
    $req->bindValue(':data_atual', $data_hora_atual);
    $req->bindValue(':id_registro', $id_chave);
    if($req->execute()){
        header('Location: ../../views/devolver_chave.php');
    }else{
        header('Location: ../../views/devolver_chave.php?error=nao_devolvida');
        //implementar mensagens de erro FUTURAMENTE
    }
}