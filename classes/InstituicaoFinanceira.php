<?php

interface InstituicaoFinanceira
{
    public function getSaldo();
    public function getLimiteDeCredito();
    public function depositar($quantia);
    public function sacar(float $quantia);
    public function getTaxaDeManutencao();
}
