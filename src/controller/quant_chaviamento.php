<?

require_once('../../config/dbConnect.php'); // Inclui a conexão com o banco de dados

// Busca as chaves cadastradas
$sql = "SELECT id, descricao, numero FROM chave"; // Supondo que a tabela se chama 'chaves'
$stmt = $pdo->query($sql);
$chaves = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

