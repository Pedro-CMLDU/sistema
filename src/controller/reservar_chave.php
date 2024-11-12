<?php
require_once('../../config/dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Captura os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome');
    $data = filter_input(INPUT_POST, 'data');
    $hora = filter_input(INPUT_POST, 'hora');
    $sala = filter_input(INPUT_POST, 'sala');

} 