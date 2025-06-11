<div class="filtro-container">
    <h2>Filtrar Consultas</h2>
    <form action="index.php" method="GET" class="filtro-form">
        <input type="hidden" name="acao" value="filtrar">

        <div class="form-group">
            <label for="codigo_consulta">Código da Consulta</label>
            <input type="text" id="codigo_consulta" name="codigo" placeholder="Digite o código">
        </div>

        <div class="form-group">
            <label for="medico">Nome do Médico</label>
            <input type="text" id="medico" name="medico" placeholder="Digite o nome">
        </div>

        <div class="form-group">
            <label for="especialidade">Especialidade</label>
            <select id="especialidade" name="especialidade">
                <option value="">Todas</option>
                <option value="Cardiologia">Cardiologia</option>
                <option value="Dermatologia">Dermatologia</option>
                <option value="Pediatria">Pediatria</option>
                <option value="Ortopedia">Ortopedia</option>
                <option value="Ginecologia">Ginecologia</option>
                <option value="Oftalmologia">Oftalmologia</option>
                <option value="Psiquiatria">Psiquiatria</option>
                <option value="Neurologia">Neurologia</option>
                <option value="Endocrinologia">Endocrinologia</option>
                <option value="Gastroenterologia">Gastroenterologia</option>
                <option value="Urologia">Urologia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Todos</option>
                <option value="Agendada">Agendada</option>
                <option value="Realizada">Realizada</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>

        <div class="form-group intervalo">
            <label>Data</label>
            <div class="campo-intervalo">
                <input type="date" name="data_min">
                <span class="ate">até</span>
                <input type="date" name="data_max">
            </div>
        </div>

        <div class="form-group intervalo">
            <label>Hora</label>
            <div class="campo-intervalo">
                <input type="time" name="horario_min">
                <span class="ate">até</span>
                <input type="time" name="horario_max">
            </div>
        </div>

        <div class="form-group botao">
            <button type="submit">Filtrar</button>
        </div>
    </form>
</div>

<style>
    .filtro-container {
        margin-left: 100px;
        margin-right: 100px;
        padding: 20px;
        background-color:rgb(235, 238, 240);
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .filtro-container h2 {
        margin-bottom: 15px;
        font-size: 20px;
    }

    .filtro-form {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-group {
        flex: 1 1 200px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    .form-group input,
    .form-group select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group.intervalo {
        flex: 1 1 300px;
    }

    .campo-intervalo {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .campo-intervalo input {
        flex: 1;
    }

    .form-group.intervalo span {
        color: #333;
        white-space: nowrap;
    }

    .form-group.botao {
        flex: 1 1 100%;
        display: flex;
        justify-content: flex-end;
    }

    .form-group.botao button {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group.botao button:hover {
        background-color: #0056b3;
    }
</style>