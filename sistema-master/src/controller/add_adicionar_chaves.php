<?php 
//Lógica de inserção na tabela professor
require_once ('../../config/dbConnect.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sala = filter_input(INPUT_POST, 'sala');
    $localizacao = filter_input(INPUT_POST, 'localizacao');

    $insertchave = "INSERT INTO chave (descricao, numero) VALUES(:descricao, :numero)";
    $req = $dbh->prepare($insertchave);
    $req->bindValue(':descricao', $sala);
    $req->bindValue(':numero', $localizacao);
    if($req->execute()){
        header("Location: ../../views/adicionar_chave.php?sucesso=1");

    }else{
        header("Location: ../../views/adicionar_chave.php?sucesso=0");
    }

}else{
    header("Location: ../../views/adicionar_chave.php");
}
?>