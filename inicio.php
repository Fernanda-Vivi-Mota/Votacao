<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Votação</title>
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
        .button-container {
            margin-top: 50px;
        }
        button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
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
</head>
<body>
    
    <h1>Bem-vindo à Votação de Projetos</h1>
    <div class="button-container">
        <button onclick="window.location.href='votar.php'">Iniciar Votação</button>
        <button onclick="window.location.href='ranking.php'">Ver Resultados</button>
        <form action="zerar_votacao.php" method="POST" style="display:inline;">
            <button type="submit" class="btn-red">Zerar Votação</button>
        </form>
    </div>

</body>
</html>
