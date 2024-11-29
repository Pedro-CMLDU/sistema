<?php
$user = "root"; //variavel em PHP usa $
$pass = "123456";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gabriel', $user, $pass);
} catch (PDOException $e) {
    echo "Erro!";
    echo $e;
}
?>