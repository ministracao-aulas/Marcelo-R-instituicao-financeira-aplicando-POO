<?php

require_once __DIR__ . '/classes/ContaCorrente.php';
require_once __DIR__ . '/classes/ExceptionSaldoInsuficiente.php';
require_once __DIR__ . '/classes/Test.php';

function dd(...$params)
{
    die(var_export($params, true));
}

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

/*
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
*/


$test = Test::init();
$expected = 3000;
$test->expectEqual($conta->getSaldo(), $expected, "É esperado que o saldo seja de {$expected}");

$conta->depositar(200);
$expected = 3200;
$test->expectEqual($conta->getSaldo(), $expected, "É esperado que o saldo seja de {$expected}");

$conta->aplicarTaxaDeManutencao();
$expected = 3200 - $conta->getTaxaDeManutencao();
$test->expectEqual($conta->getSaldo(), $expected, "É esperado que o saldo seja de {$expected} depois da taxa de manutenção");

$test->expectEqual($conta->sacar(3000), true, "É esperado que o valor seja TRUE");

$expected = floatval(180);
$test->expectEqual($conta->getSaldo(), $expected, "É esperado que o saldo seja de {$expected}");

$test->expectException(fn () => $conta->sacar(3000), ExceptionSaldoInsuficiente::class);

$test->expectTrue(true);
