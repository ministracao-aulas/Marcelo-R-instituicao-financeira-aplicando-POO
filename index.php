<?php

require_once __DIR__ . '/classes/ContaCorrente.php';

$dados = [
    'saldo' => 3000,
    'limiteDeCredito' => 500,
    'taxaDeManutencao' => 20,
];

$conta = new ContaCorrente(
    $dados['saldo'],
    $dados['limiteDeCredito'],
    $dados['taxaDeManutencao'],
);

echo implode(
    PHP_EOL,
    [
        $conta->depositar(200),
        $conta->getSaldo(),
        $conta->sacar(3000),
        $conta->getSaldo(),
        $conta->aplicarTaxaDeManutencao(),
        $conta->getSaldo(),
    ]
) . PHP_EOL;
