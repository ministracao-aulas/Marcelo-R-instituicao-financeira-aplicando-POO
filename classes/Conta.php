<?php

require_once 'InstituicaoFinanceira.php';

// Abstração
abstract class Conta implements InstituicaoFinanceira {
    protected $saldo;
    protected $limiteDeCredito;

    public function __construct($saldo, $limiteDeCredito) {
        $this->saldo = $saldo;
        $this->limiteDeCredito = $limiteDeCredito;
    }

    // Encapsulamento
    public function getSaldo() {
        return $this->saldo;
    }

    public function getLimiteDeCredito() {
        return $this->limiteDeCredito;
    }

    public function depositar($quantia) {
        $this->saldo += $quantia;
    }

    // Polimorfismo
    public function sacar($quantia) {
        if ($quantia <= $this->saldo) {
            $this->saldo -= $quantia;
            return true;
        } elseif ($quantia <= $this->saldo + $this->limiteDeCredito) {
            $this->saldo -= $quantia;
            return true;
        } else {
            return false;
        }
    }
}
