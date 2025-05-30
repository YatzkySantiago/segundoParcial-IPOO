<?php
class EmpresaCable{
    private $planes;
    private $canales;
    private $clientes;
    private $contratos;

	public function __construct($planes = [], $canales = [], $clientes = [], $contratos = []) {
		$this->planes = $planes;
		$this->canales = $canales;
		$this->clientes = $clientes;
		$this->contratos = $contratos;
	}

	public function getPlanes() {
		return $this->planes;
	}
	public function setPlanes($value) {
		$this->planes[] = $value;
	}

	public function getCanales() {
		return $this->canales;
	}
	public function setCanales($value) {
		$this->canales[] = $value;
	}

	public function getClientes() {
		return $this->clientes;
	}
	public function setClientes($value) {
		$this->clientes[] = $value;
	}

	public function getContratos() {
		return $this->contratos;
	}
	public function setContratos($value) {
		$this->contratos[] = $value;
	}

    public function incorporarPlan($value){
        foreach ($this->getPlanes() as $planes) {
            if ($planes->getCanales() != $value->getCanales() && $planes->getMG() != $value->getMG()) {
                $this->setPlanes($value);
            }
        }
    }

    public function buscarContrato($tipo, $num){
        $contract = null;
        foreach ($this->getContratos() as $contrato) {
            $cliente = $contrato->getCliente();
            if ($type == $cliente->getTipoDocumento() && $number == $cliente->getNumeroDocumento()) {
                $cliente = $contrato;
            }
        }
        return $contract;
    }

    public function incorporarContrato($plan, $cliente, $fechaInicio, $fechaFin, $web){
        
    }
}