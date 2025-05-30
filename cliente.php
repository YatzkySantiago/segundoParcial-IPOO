<?php
class Cliente{
    private $tipoDocumento;
    private $numeroDocumento;

	public function __construct($tipoDocumento, $numeroDocumento) {
		$this->tipoDocumento = $tipoDocumento;
		$this->numeroDocumento = $numeroDocumento;
	}

	public function getTipoDocumento() {
		return $this->tipoDocumento;
	}
	public function setTipoDocumento($value) {
		$this->tipoDocumento = $value;
	}

	public function getNumeroDocumento() {
		return $this->numeroDocumento;
	}
	public function setNumeroDocumento($value) {
		$this->numeroDocumento = $value;
	}
}