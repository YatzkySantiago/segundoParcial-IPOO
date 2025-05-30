<?php
include_once 'canales.php';
include_once 'contrato.php';
include_once 'contratoWeb.php';
include_once 'planes.php';
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

    public function incorporarContrato($plan, $cliente, $fechaInicio, $fechaFin, $id, $web){
        $contratoExistente = $this->buscarContrato($cliente->getTipoDocumento(), $cliente->getNumeroDocumento());
        if ($contratoExistente != null && $contratoExistente->getEstadoContrato() == "al dia") {
            $contratoExistente->setEstadoContrato("finalizado");
        }
        if ($web) {
            $contratoNuevo = new ContratoWeb($fechaInicio, $fechaFin, $plan, "al dia", 0, true, $cliente, $id);
        } else {
            $contratoNuevo = new Contrato($fechaInicio, $fechaFin, $plan, "al dia", 0, true, $cliente, $id);
        }
        $costo = $contratoNuevo->calcularImporte();
        $contratoNuevo->setCosto($costo);
        $this->setContratos($contratoNuevo);
    }

    public function retornarPromImporteContratos($codigo){
        $suma = 0;
        $cuenta = 0;
        foreach ($this->getContratos() as $contrato) {
            $plan = $contrato->getPlan();
            if ($plan->getCodigo() == $codigo) {
                $suma = $suma + $contrato->getCostoContrato();
                $cuenta ++;
            }
        }
        if ($suma == 0 && $cuenta == 0) {
            $promedio = 0;
        } else {
            $promedio = $suma / $cuenta;
        }
        return $promedio;
    }

    public function pagarContrato($codigo){
        $valor = 0;
        foreach ($this->getContratos() as $contrato) {
            if ($contrato->getId() == $codigo) {
                $contrato->actualizarEstadoContrato("al dia");
                $valor = $contrato->calcularImporte();
            }
        }
        return $valor;
    }
}