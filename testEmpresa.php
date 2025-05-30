<?php
include_once 'canales.php';
include_once 'contrato.php';
include_once 'contratoWeb.php';
include_once 'empresaCable.php';
include_once 'planes.php';

$canal1 = new Canal("historia", 1000, true);
$canal2 = new Canal("cine", 5000, true);
$canal3 = new Canal("novelas", 800, false);

$plan1 = new Plan(111, 9000, [$canal1, $canal2, $canal3]);
$plan2 = new Plan(900, 700, [$canal1, $canal2, $canal3]);

$cliente = new Cliente("dni",42912487);

$empresa = new EmpresaCable([$plan1, $plan2],[$canal1, $canal2, $canal3],[$cliente],[$contrato]);

$contrato1 = new Contrato(21, 23, $plan1, "al dia", 10000, true, $cliente, 900);
$contrato2 = new ContratoWeb(21, 23, $plan2, "al dia", 10000, true, $cliente, 1221);
$contrato3 = new ContratoWeb(25, 20, $plan2, "moroso", 10000, true, $cliente, 1221);

$valor1 = $contrato1->calcularImporte();
$valor2 = $contrato2->calcularImporte();
$valor3 = $contrato3->calcularImporte();

echo $valor1 . " " . $valor2 . " " . $valor3 . "\n";

$empresa->incorporarPlan($plan1);
$empresa->incorporarPlan($plan2);

$empresa->incorporarContrato($plan1, $cliente, 30, 31, false);
$empresa->incorporarContrato($plan2, $cliente, 30, 31, true);

$empresa->pagarContrato($contrato1->getCodigo());
$empresa->pagarContrato($contrato2->getCodigo());

$empresa->retornarPromImporteContratos(111);