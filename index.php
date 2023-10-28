<?php

require_once 'classes/ContaCorrente.php';

$dados = [
    'saldo' => 1000,
    'limiteDeCredito' => 500,
    'taxaDeManutencao' => 20
];

$conta = new ContaCorrente($dados['saldo'], $dados['limiteDeCredito'], $dados['taxaDeManutencao']);
$conta->depositar(200);
echo "Saldo: " . $conta->getSaldo() . PHP_EOL;
$conta->sacar(700);
echo "Saldo: " . $conta->getSaldo() . PHP_EOL;
$conta->aplicarTaxaDeManutencao();
echo "Saldo: " . $conta->getSaldo() . PHP_EOL;
