<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keybox - Retirar Chave</title>
    <link rel="stylesheet" href="../css/estilo-chave.css"> <!-- Referência ao arquivo CSS externo -->
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
        <a href="index_menu.php">Início > Retirar</a>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Retirar Chave</h2>
            <form class="formulario" action="../src/controller/reservar_chave.php" method="POST">
                <div class="form-inputs">
                    <!-- Campo para o nome de quem retirou a chave -->
                    <div class="quem-retirou">
                        <label for="nome" class="custom-label">Quem retirou:</label>
                        <input type="text" id="nome" name="nome" placeholder="Pesquise por: Nome, Cargo, Contato">
                    </div>

                    <!-- Campos para a data e hora -->
                    <div class="data-hora">
                        <div class="data">
                            <label for="data" class="custom-label">Data:</label>
                            <input class="data-horainput" type="text" id="data" name="data" placeholder="06/08/2024">
                        </div>
                        <div class="hora">
                            <label for="hora" class="custom-label">Hora:</label>
                            <input class="data-horainput" type="text" id="hora" name="hora" placeholder="08:17">
                        </div>
                    </div>

                    <!-- Campo para a descrição da chave (ex: sala) -->
                    <div class="chave">
                        <label for="sala" class="custom-label">Chave:</label>
                        <input type="text" id="sala" name="sala" placeholder="sala 07">
                    </div>
                </div>

                <!-- Botões de ação -->
                <div class="form-botoes">
                    <button type="submit" class="butao">Salvar</button>
                    <button type="button" class="butao">
                        <a href="index_menu.php">Cancelar</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>