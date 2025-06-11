<?php

require_once __DIR__ . "/../model/Consulta.php";
require_once __DIR__ . "/../model/ConsultaDAO.php";

class ConsultaController
{
    public function listarConsultas()
    {
        $dao = new ConsultaDAO();
        $consultas = $dao->buscarTodos();

        include __DIR__ . "/../view/pages/ListaConsultas.php";
    }

    public function mostrarPaginaCadastro()
    {
        include __DIR__ . "/../view/pages/CadastroConsultas.php";
    }

    public function cadastrar()
    {
        $consulta = new Consulta(
            null,
            $_POST['especialidade'],
            $_POST['duracao'],
            $_POST['valor'],
            $_POST['medico'],
            $_POST['data'],
            $_POST['horario'],
            $_POST['status']
        );

        $dao = new ConsultaDAO();
        $dao->cadastrar($consulta);

        header("Location: index.php");
        exit();
    }

    public function excluir()
    {
        if (isset($_GET['codigo'])) {
            $consulta = new Consulta(
                $_GET['codigo'], 
                null, 
                null, 
                null, 
                null, 
                null, 
                null, 
                null
            );

            $dao = new ConsultaDAO();
            $dao->excluir($consulta);

            header("Location: index.php");
            exit();
        }
    }

    public function mostrarPaginaAlterar()
    {
        if (isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            $dao = new ConsultaDAO();
            $dados = $dao->buscarPorCodigo($codigo);

            include __DIR__ . "/../view/pages/CadastroConsultas.php";
        }
    }

    public function alterar()
    {
        $consulta = new Consulta(
            $_POST['codigo'],
            $_POST['especialidade'],
            $_POST['duracao'],
            $_POST['valor'],
            $_POST['medico'],
            $_POST['data'],
            $_POST['horario'],
            $_POST['status']
        );

        $dao = new ConsultaDAO();
        $dao->alterar($consulta);

        header("Location: index.php");
        exit();
    }

    public function filtrarConsultas()
    {
        $filtros = [];

        if (!empty($_GET['codigo'])) $filtros['codigo'] = $_GET['codigo'];
        if (!empty($_GET['medico'])) $filtros['medico'] = $_GET['medico'];
        if (!empty($_GET['especialidade'])) $filtros['especialidade'] = $_GET['especialidade'];
        if (!empty($_GET['status'])) $filtros['status'] = $_GET['status'];
        if (!empty($_GET['data_min'])) $filtros['data_min'] = $_GET['data_min'];
        if (!empty($_GET['data_max'])) $filtros['data_max'] = $_GET['data_max'];
        if (!empty($_GET['horario_min'])) $filtros['horario_min'] = $_GET['horario_min'];
        if (!empty($_GET['horario_max'])) $filtros['horario_max'] = $_GET['horario_max'];

        $dao = new ConsultaDAO();
        $consultas = $dao->buscarPorFiltro($filtros);

        include __DIR__ . "/../view/pages/ListaConsultas.php";
        exit();
    }
}