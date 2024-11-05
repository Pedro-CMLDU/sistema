<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo de Funcionário</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilofun.css">
</head>
<body>
    <header class="header">
        <div class="retangulo-superior">
            <div class="keybox">
                <img src="../imagem/logo.png" alt="keybox">
            </div>
            <div class="imglogosenac">
                <img src="../imagem/logosenac.png" alt="logosenac" class="img_senac_logo">
            </div>
        </div>
    </header>
    
    <nav class="breadcrumb">
        <a href="index_menu.php">Início</a> >
        <a href="fucionario.php">Voltar</a>
    </nav>
    
    <main class="main-content">
        <div class="form-container">
            <h2>Tipo de Funcionário</h2>
            <form action="processa_tipo_funcionario.php" method="POST">
                <div class="input-group">
                    <label for="tipo_funcionario">Informe a Profissão:</label>
                    <input type="text" id="tipo_funcionario" name="tipo_funcionario" placeholder="Ex: Professor, Gerente" required>
                </div>
                
                <button type="submit" class="submit-button">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>