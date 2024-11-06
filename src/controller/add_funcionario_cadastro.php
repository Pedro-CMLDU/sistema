<?php 
//Lógica de inserção na tabela professor
require_once ('../../config/dbConnect.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = filter_input(INPUT_POST, 'nome');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $cargo = "Porteiro";

    $insertProf = "INSERT INTO func VALUES(null, :nome, :cargo, :contato, :cod_tip_func, :email, :senha)";
    $req = $dbh->prepare($insertProf);
    $req->bindValue(':nome', $nome);
    $req->bindValue(':cargo', $cargo);
    $req->bindValue(':contato', $telefone);
    $req->bindValue(':cod_tip_func', 5);
    if($req->execute()){
        header("Location: ../../views/add_fun.php?sucesso=1");

    }else{
        header("Location: ../../views/add_fun.php?sucesso=0");
    }

}else{
    header("Location: ../../views/add_fun.php");
}


/* 
1º Receber as informações do HTML via POST
2º preparar a string de inserção 
3º executar
4º Exibir uma mensagem de cadastro realizador com sucesso.

*/
?>