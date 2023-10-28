<?php

require_once __DIR__ . '/Conta.php';

// Herança
class ContaCorrente extends Conta
{
    private $taxaDeManutencao;

    public function __construct($saldo, $limiteDeCredito, $taxaDeManutencao)
    {
        parent::__construct($saldo, $limiteDeCredito);
        $this->taxaDeManutencao = $taxaDeManutencao;
    }

    public function aplicarTaxaDeManutencao()
    {
        $this->saldo -= $this->taxaDeManutencao;
    }

    public function getTaxaDeManutencao()
    {
        return $this->taxaDeManutencao;
    }
}
