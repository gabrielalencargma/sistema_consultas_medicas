<?php

require_once __DIR__ . "/Database.php";

class ConsultaDAO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function cadastrar($consulta)
    {
        $sql = "INSERT INTO Consulta (especialidade, duracao, valor, medico, data, horario, status) 
                VALUES (:especialidade, :duracao, :valor, :medico, :data, :horario, :status)";
        
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':especialidade', $consulta->getEspecialidade());
        $stmt->bindParam(':duracao', $consulta->getDuracao());
        $stmt->bindParam(':valor', $consulta->getValor());
        $stmt->bindParam(':medico', $consulta->getMedico());
        $stmt->bindParam(':data', $consulta->getData());
        $stmt->bindParam(':horario', $consulta->getHorario());
        $stmt->bindParam(':status', $consulta->getStatus());

        $stmt->execute();
    }

    public function excluir($consulta){
        $sql = "DELETE FROM Consulta WHERE codigo = :codigo";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':codigo',$consulta->getCodigo());

        $stmt->execute();
    }

    public function alterar($consulta)
    {
        $sql = "UPDATE Consulta SET 
                especialidade = :especialidade, 
                duracao = :duracao, 
                valor = :valor, 
                medico = :medico, 
                data = :data, 
                horario = :horario, 
                status = :status 
                WHERE codigo = :codigo";
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':especialidade', $consulta->getEspecialidade());
        $stmt->bindParam(':duracao', $consulta->getDuracao());
        $stmt->bindParam(':valor', $consulta->getValor());
        $stmt->bindParam(':medico', $consulta->getMedico());
        $stmt->bindParam(':data', $consulta->getData());
        $stmt->bindParam(':horario', $consulta->getHorario());
        $stmt->bindParam(':status', $consulta->getStatus());
        $stmt->bindParam(':codigo', $consulta->getCodigo());

        $stmt->execute();
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM Consulta";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorCodigo($codigo)
    {
        $sql = "SELECT * FROM Consulta WHERE codigo = :codigo";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':codigo', $codigo);
        
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorFiltro($filtros = [])
    {
        $sql = "SELECT * FROM Consulta WHERE 1=1";
        $params = [];

        if (!empty($filtros['codigo'])) {
            $sql .= " AND codigo = :codigo";
            $params[':codigo'] = $filtros['codigo'];
        }

        if (!empty($filtros['medico'])) {
            $sql .= " AND medico LIKE :medico";
            $params[':medico'] = '%' . $filtros['medico'] . '%';
        }

        if (!empty($filtros['especialidade'])) {
            $sql .= " AND especialidade = :especialidade";
            $params[':especialidade'] = $filtros['especialidade'];
        }

        if (!empty($filtros['status'])) {
            $sql .= " AND status = :status";
            $params[':status'] = $filtros['status'];
        }

        if (!empty($filtros['data_min'])) {
            $sql .= " AND data >= :data_min";
            $params[':data_min'] = $filtros['data_min'];
        }

        if (!empty($filtros['data_max'])) {
            $sql .= " AND data <= :data_max";
            $params[':data_max'] = $filtros['data_max'];
        }

        if (!empty($filtros['horario_min'])) {
            $sql .= " AND horario >= :horario_min";
            $params[':horario_min'] = $filtros['horario_min'];
        }

        if (!empty($filtros['horario_max'])) {
            $sql .= " AND horario <= :horario_max";
            $params[':horario_max'] = $filtros['horario_max'];
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}