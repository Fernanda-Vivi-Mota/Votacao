<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'votos';
$user = 'root';
$pass = '';

// Conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

// Apagar todos os registros de votos
$query = "DELETE FROM votos_projetos";
$pdo->exec($query);

echo "Votação zerada com sucesso!";
header("refresh:3;url=inicio.php"); // Redireciona de volta para a página inicial após 3 segundos
exit;
?>
