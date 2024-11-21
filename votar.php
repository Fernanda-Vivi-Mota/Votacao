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

// Receber o voto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['projeto'])) {
    $projeto_id = $_POST['projeto'];
    $usuario_ip = $_SERVER['REMOTE_ADDR']; // Pega o IP do usuário

    // Inserir o voto no banco de dados
    $stmt = $pdo->prepare("INSERT INTO votos_projetos (projeto_id, usuario_ip) VALUES (:projeto_id, :usuario_ip)");
    $stmt->execute(['projeto_id' => $projeto_id, 'usuario_ip' => $usuario_ip]);
 
    echo "Voto registrado com sucesso!";
    header("Location: fim.html");
    
    $tempoDeEspera = 3;
    header("refresh:$tempoDeEspera;url=index.html");
   
} else {
    echo "Nenhum voto foi registrado.";
    header("Location: index.html");
}
?>