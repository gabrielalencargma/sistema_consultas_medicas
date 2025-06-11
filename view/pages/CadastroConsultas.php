<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?php echo isset($dados['codigo']) ? "Alteração de Consulta" : "Cadastro de Consulta" ?></title>

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
            padding-bottom: 70px;
        }

        .titulo-pagina {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 100px 50px 100px;
            flex-wrap: wrap;
        }

        .titulo-pagina h1 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }

        .btn-voltar {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-voltar:hover {
            background-color: #0056b3;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[readonly] {
            background-color: #e9ecef;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <?php include __DIR__ . '/../components/Header.php'; ?>

        <div class="main-content">
            <div class="titulo-pagina">
                <h1><?php echo isset($dados['codigo']) ? "Alteração de Consulta" : "Cadastro de Consulta" ?></h1>
                <a href="index.php?acao=listar" class="btn-voltar">Voltar</a>
            </div>

            <form action="index.php" method="POST">
                <label>Código</label>
                <input type="text" name="codigo" value="<?php echo isset($dados['codigo']) ? $dados['codigo'] : ''; ?>" readonly>

                <label>Especialidade</label>
                <select name="especialidade">
                    <?php
                    $especialidades = [
                        "Cardiologia", "Dermatologia", "Pediatria", "Ortopedia", "Ginecologia",
                        "Oftalmologia", "Psiquiatria", "Neurologia", "Endocrinologia", "Gastroenterologia", "Urologia"
                    ];
                    foreach ($especialidades as $esp) {
                        $selected = isset($dados['especialidade']) && $dados['especialidade'] === $esp ? 'selected' : '';
                        echo "<option value=\"$esp\" $selected>$esp</option>";
                    }
                    ?>
                </select>

                <label>Médico</label>
                <input type="text" name="medico" value="<?php echo isset($dados['medico']) ? $dados['medico'] : ''; ?>">

                <label>Data</label>
                <input type="date" name="data" value="<?php echo isset($dados['data']) && $dados['data'] ? date('Y-m-d', strtotime($dados['data'])) : ''; ?>">

                <label>Horário</label>
                <input type="time" name="horario" value="<?php echo isset($dados['horario']) ? $dados['horario'] : ''; ?>">

                <label>Duração (minutos)</label>
                <input type="number" name="duracao" value="<?php echo isset($dados['duracao']) ? $dados['duracao'] : ''; ?>">

                <label>Valor (R$)</label>
                <input type="text" name="valor" value="<?php echo isset($dados['valor']) ? $dados['valor'] : ''; ?>">

                <label>Status</label>
                <select name="status">
                    <option value="agendada" <?php echo (isset($dados['status']) && $dados['status'] == 'agendada') ? 'selected' : ''; ?>>Agendada</option>
                    <option value="realizada" <?php echo (isset($dados['status']) && $dados['status'] == 'realizada') ? 'selected' : ''; ?>>Realizada</option>
                    <option value="cancelada" <?php echo (isset($dados['status']) && $dados['status'] == 'cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                </select>

                <input type="hidden" name="acao" value="<?php echo isset($dados['codigo']) ? 'alterar' : 'cadastrar'; ?>">
                <input type="submit" value="<?php echo isset($dados['codigo']) ? 'Alterar Consulta' : 'Cadastrar Consulta'; ?>">
            </form>
        </div>

        <?php include __DIR__ . '/../components/Footer.php'; ?>
    </div>
</body>
</html>
