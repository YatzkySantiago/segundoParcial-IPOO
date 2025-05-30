<?php
include_once 'contrato.php';
class ContratoWeb extends Contrato{
    private $porcentajeDescuento;

	public function __construct($fechaInicio, $fechaVencimiento, $plan, $estadoContrato, $costoContrato, $renovacion, $cliente, $porcentajeDescuento) {
        parent::__construct($fechaInicio, $fechaVencimiento, $plan, $estadoContrato, $costoContrato, $renovacion, $cliente);
		$this->porcentajeDescuento = $porcentajeDescuento;
	}

	public function getPorcentajeDescuento() {
		return $this->porcentajeDescuento;
	}
	public function setPorcentajeDescuento($value) {
		$this->porcentajeDescuento = $value;
	}

	public function __toString(){
		return "fecha inicio: " . $this->getFechaInicio() . "\nfecha Vencimiento: " . $this->getFechaVencimiento() . "\nplan: " . $this->getPlan() . "\nEstado del contrato: " . $this->getEstadoContrato() . "\nCosto: " . $this->getCostoContrato() . "\nrenovacion: " . $this->getRenovacion() . "\nCliente: " . $this->getCliente() . "\nporcentaje descuento: " . $this->getPorcentajeDescuento();
	}
}