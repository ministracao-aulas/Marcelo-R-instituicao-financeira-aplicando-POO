<?php

require_once __DIR__ . '/classes/ContaCorrente.php';

$dados = [
    'saldo' => 3000,
    'limiteDeCredito' => 500,
    'taxaDeManutencao' => 20
];

$conta = new ContaCorrente($dados['saldo'], $dados['limiteDeCredito'], $dados['taxaDeManutencao']);
echo $conta->depositar(200) . " | ";
echo $conta->getSaldo() . " | ";
echo $conta->sacar(3000) . " | ";
echo $conta->getSaldo() . " | ";
echo $conta->aplicarTaxaDeManutencao() . " | ";
echo $conta->getSaldo() . PHP_EOL;
