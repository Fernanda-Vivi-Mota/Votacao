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

// Consultar o total de votos por projeto, ordenando por mais votado
$query = "
    SELECT projeto_id, COUNT(projeto_id) as total_votos 
    FROM votos_projetos 
    GROUP BY projeto_id 
    ORDER BY total_votos DESC
";
$stmt = $pdo->query($query);
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking de Votação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

       
        .button-container {
            margin-top: 50px;
        }
        button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 16px;
            color: white;
            background-color:  #64a1d3;;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .btn-red {
            background-color: #dc3545;
        }
        .btn-red:hover {
            background-color: #c82333;
        }
    </style>
    </style>
</head>
<body>

    <h1>Ranking dos Projetos Mais Votados</h1>

    <table>
        <thead>
            <tr>
                <th>Projeto</th>
                <th>Total de Votos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $row): ?>
                <tr>
                    <td>Projeto <?php echo $row['projeto_id']; ?></td>
                    <td><?php echo $row['total_votos']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button onclick="window.location.href='votar.php'">Voltar a Votação</button>
</body>
</html>
