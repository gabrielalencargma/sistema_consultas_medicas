<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <title>Lista de Consultas</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f2f6fa;
            font-family: Arial, sans-serif;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
        }

        .card-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 0 100px 50px 100px;
        }

        .consulta-card {
            width: 100%;
            max-width: 300px;
            box-sizing: border-box;
        }

        .titulo-consultas {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 100px 20px 100px;
            flex-wrap: wrap;
        }

        .titulo-consultas h1 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }

        .btn-cadastrar {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-cadastrar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <?php include __DIR__ . '/../components/Header.php'; ?>

        <div class="main-content">
            <div class="titulo-consultas">
                <h1>Lista de Consultas</h1>
                <a href="index.php?acao=paginaCadastrar" class="btn-cadastrar">Cadastrar Consulta</a>
            </div>

            <?php include __DIR__ . '/../components/FiltroConsultas.php'; ?>
            
            <div class="card-grid">
                <?php
                    usort($consultas, function($a, $b) {
                        return $b['codigo'] <=> $a['codigo'];
                    });
                ?>

                <?php foreach($consultas as $consulta): ?>
                    <?php include __DIR__ . '/../components/CardConsulta.php'; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <?php include __DIR__ . '/../components/Footer.php'; ?>
    </div>
</body>
</html>