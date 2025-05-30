<?php
include_once 'canales.php';
include_once 'contrato.php';
include_once 'contratoWeb.php';
include_once 'empresaCable.php';
class Plan{
    private $codigo;
    private $canales;
    private $importe;
    private $MG;


	public function __construct($codigo, $importe, $MG, $canales = []) {
		$this->codigo = $codigo;
		$this->canales = $canales;
		$this->importe = $importe;
		$this->MG = 100;
	}

	public function getCodigo() {
		return $this->codigo;
	}
	public function setCodigo($value) {
		$this->codigo = $value;
	}

	public function getCanales() {
		return $this->canales;
	}
	public function setCanales($value) {
		$this->canales[] = $value;
	}

	public function getImporte() {
		return $this->importe;
	}

	public function setImporte($value) {
		$this->importe = $value;
	}

	public function getMG() {
		return $this->MG;
	}

	public function setMG($value) {
		$this->MG = $value;
	}
}