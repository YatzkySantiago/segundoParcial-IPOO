<?php
class Contrato{
    private $fechaInicio;
    private $fechaVencimiento;
    private $plan;
    private $estadoContrato;
    private $costoContrato;
    private $renovacion;
    private $cliente;

	public function __construct($fechaInicio, $fechaVencimiento, $plan, $estadoContrato, $costoContrato, $renovacion, $cliente) {
		$this->fechaInicio = $fechaInicio;
		$this->fechaVencimiento = $fechaVencimiento;
		$this->plan = $plan;
		$this->estadoContrato = $estadoContrato;
		$this->costoContrato = $costoContrato;
		$this->renovacion = $renovacion;
		$this->cliente = $cliente;
	}

	public function getFechaInicio() {
		return $this->fechaInicio;
	}
	public function setFechaInicio($value) {
		$this->fechaInicio = $value;
	}

	public function getFechaVencimiento() {
		return $this->fechaVencimiento;
	}
	public function setFechaVencimiento($value) {
		$this->fechaVencimiento = $value;
	}

	public function getPlan() {
		return $this->plan;
	}
	public function setPlan($value) {
		$this->plan = $value;
	}

	public function getEstadoContrato() {
		return $this->estadoContrato;
	}
	public function setEstadoContrato($value) {
		$this->estadoContrato = $value;
	}

	public function getCostoContrato() {
		return $this->costoContrato;
	}
	public function setCostoContrato($value) {
		$this->costoContrato = $value;
	}

	public function getRenovacion() {
		return $this->renovacion;
	}
	public function setRenovacion($value) {
		$this->renovacion = $value;
	}

	public function getCliente() {
		return $this->cliente;
	}
	public function setCliente($value) {
		$this->cliente = $value;
	}

	public function actualizarEstadoContrato(){
		$dias = $this->diasContratoVencido($this);
		if ($dias == 0) {
			$this->setEstadoContrato("al dia");
		} elseif ($dias > 0 && $dias < 10) {
			$this->setEstadoContrato("moroso");
		} elseif ($dias >= 10){
			$this->setEstadoContrato("suspendido");
		}
	}

	public function calcularImporte(){
		$planElegido = $this->getPlan();
		$importeFinal = $this->getCostoContrato() + $planElegido->getImporte();
		if ($this->getEstadoContrato() == "al dia") {
			$this->setRenovacion(true);
		} elseif ($this->getEstadoContrato() == "moroso") {
			$importeFinal = $importeFinal + (($importeFinal * 0.10) * $this->diasContratoVencido($this));
			$this->setRenovacion(true);
		} elseif ($this->getEstadoContrato() == "suspendido") {
			$importeFinal = $importeFinal + (($importeFinal * 0.10) * $this->diasContratoVencido($this));
			$this->setRenovacion(false);
		} elseif ($this->getEstadoContrato() == "finalizado") {
			$this->setRenovacion(false);
		}
		return $importeFinal;
	}
}