<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keybox Interface</title>
    <link rel="stylesheet" href="../css/styles_menu.css">
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
    <div class="container"> 
        <div class="sair">
                 <a href="../src/controller/sair.php" class="link-sair">Sair</a>
        </div>
        <div class="main-content">
   
            <div class="div-um">
                <div class="section keys">
                    <a href="chaveamento.php" class="botao-sections">Chaves</a>
                </div>    
                <div class="section loans">
                    <h2>Empréstimo</h2>
                    <a href="retirar_chave.php" class="botaoemp">Retirar</a>
                    <a href="devolver_chave.php" class="botaoemp">Devolver</a>
                </div>
                   
                   
            </div>
            <div class="div-dois">
                <div class="section employees">
                    <a href="fucionario.php" class="botao-sections">Funcionários</a>
                </div>
                <div class="sidebar">
                    <div class="botoes-sidebar">
                        <a href="historico_index.php" class="botao-link">Histórico</a>
                        <a href="disponiveis_index.php" class="botao-link">Disponíveis</a>
                        <a href="reservadas_index.php" class="botao-link">Reservadas</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>