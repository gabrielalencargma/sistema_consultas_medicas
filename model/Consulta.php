<?php

class Consulta
{
    private $codigo;
    private $especialidade;
    private $duracao;
    private $valor;
    private $medico;
    private $data;
    private $horario;
    private $status;

    public function __construct($codigo, $especialidade, $duracao, $valor, $medico, $data, $horario, $status)
    {
        $this->codigo = $codigo;
        $this->especialidade = $especialidade;
        $this->duracao = $duracao;
        $this->valor = $valor;
        $this->medico = $medico;
        $this->data = $data;
        $this->horario = $horario;
        $this->status = $status;
    }

    public function getCodigo() { return $this->codigo; }
    public function getEspecialidade() { return $this->especialidade; }
    public function getDuracao() { return $this->duracao; }
    public function getValor() { return $this->valor; }
    public function getMedico() { return $this->medico; }
    public function getData() { return $this->data; }
    public function gethorario() { return $this->horario; }
    public function getStatus() { return $this->status; }
}