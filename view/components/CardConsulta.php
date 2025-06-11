<div class="consulta-card">
    <div class="card-header">
        <h3>Consulta #<?php echo $consulta['codigo'] ?></h3>
        <span class="status <?= strtolower($consulta['status']) ?>">
            <?php echo $consulta['status'] ?>
        </span>

    </div>

    <div class="card-body">
        <p><strong>Médico:</strong> <?php echo $consulta['medico'] ?></p>
        <p><strong>Especialidade:</strong> <?php echo $consulta['especialidade'] ?></p>
        <p><strong>Duração:</strong> <?php echo $consulta['duracao'] ?> minutos</p>
        <p><strong>Valor:</strong> R$ <?php echo number_format($consulta['valor'], 2, ',', '.') ?></p>
        <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($consulta['data'])) ?></p>
        <p><strong>Horário:</strong> <?php echo date('H:i', strtotime($consulta['horario'])) ?></p>
    </div>

    <div class="card-actions">
        <a href="index.php?acao=paginaAlterar&codigo=<?php echo $consulta['codigo'] ?>" class="btn alterar">Alterar</a>
        <a href="index.php?acao=excluir&codigo=<?php echo $consulta['codigo'] ?>" class="btn excluir" onclick="return confirm('Tem certeza que deseja excluir esta consulta?')">Excluir</a>
    </div>
</div>

<style>
    .consulta-card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .card-header h3 {
        margin: 0;
        font-size: 18px;
    }

    .status {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        color: #fff;
        text-transform: uppercase;
    }

    .status.agendada {
        background-color: #007bff;
    }

    .status.realizada {
        background-color: #28a745;
    }

    .status.cancelada {
        background-color: #dc3545;
    }

    .card-body p {
        margin: 4px 0;
        font-size: 14px;
    }

    .card-actions {
        margin-top: 12px;
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        color: white;
    }

    .btn.alterar {
        background-color: #ffc107;
    }

    .btn.alterar:hover {
        background-color: #e0a800;
    }

    .btn.excluir {
        background-color: #dc3545;
    }

    .btn.excluir:hover {
        background-color: #bd2130;
    }
</style>