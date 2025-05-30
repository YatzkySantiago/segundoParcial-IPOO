<?php
include_once 'contrato.php';
class ContratoWeb extends Contrato{
    private $porcentajeDescuento;

	public function __construct($fechaInicio, $fechaVencimiento, $plan, $estadoContrato, $costoContrato, $renovacion, $cliente, $id,$porcentajeDescuento) {
        parent::__construct($fechaInicio, $fechaVencimiento, $plan, $estadoContrato, $costoContrato, $renovacion, $cliente, $id);
		$this->porcentajeDescuento = 10;
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

	public function calcularImporte(){
		$importebase = parent::calcularImporte();
		$importeFinal = $importeBase - ($importebase * 0.10);
		return $importeFinal;
	}
}