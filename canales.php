<?php
class Canal{
    private $tipo;
    private $importe;
    private $HD;


	public function __construct($tipo, $importe, $HD) {
		$this->tipo = $tipo;
		$this->importe = $importe;
		$this->HD = $HD;
	}

	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($value) {
		$this->tipo = $value;
	}

	public function getImporte() {
		return $this->importe;
	}
	public function setImporte($value) {
		$this->importe = $value;
	}

	public function getHD() {
		return $this->HD;
	}
	public function setHD($value) {
		$this->HD = $value;
	}
}