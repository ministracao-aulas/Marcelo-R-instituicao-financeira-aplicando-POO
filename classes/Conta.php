<?php

require_once __DIR__ . '/InstituicaoFinanceira.php';
require_once __DIR__ . '/ExceptionSaldoInsuficiente.php';

// Abstração
abstract class Conta implements InstituicaoFinanceira
{
    protected $saldo;
    protected $limiteDeCredito;

    public function __construct($saldo, $limiteDeCredito)
    {
        $this->saldo = $saldo;
        $this->limiteDeCredito = $limiteDeCredito;
    }

    // Encapsulamento
    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getLimiteDeCredito()
    {
        return $this->limiteDeCredito;
    }

    public function depositar($quantia)
    {
        $this->saldo += $quantia;
        return true;
    }

    // Polimorfismo
    public function sacar(float $quantia)
    {
        if ($quantia <= $this->saldo) {
            $this->saldo -= $quantia;
            return true;
        }

        if ($quantia <= $this->saldo + $this->limiteDeCredito) {
            $this->saldo -= $quantia;
            return true;
        }

        throw new ExceptionSaldoInsuficiente('Saldo insuficiente para ação de [saque].', 100);
    }
}
