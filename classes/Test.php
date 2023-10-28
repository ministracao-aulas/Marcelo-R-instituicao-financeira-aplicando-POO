<?php

class Test
{
    protected array $data;
    public function __construct(...$data)
    {
        $this->data = $data;
    }

    public static function init(...$params)
    {
        return new static(...$params);
    }

    public function putLine(string $toRepeat = '-', int $manyTimes = 50)
    {
        echo PHP_EOL . str_repeat($toRepeat, $manyTimes) . PHP_EOL;
    }

    public function expectEqual($value, $expected, string $testDescription)
    {
        $result = ($expected === $value);
        $this->putLine();
        echo $testDescription . PHP_EOL;
        echo $result ? '✅ Success' : '❌ Fail: ' . sprintf(
            'Expected %s, but gives %s',
            var_export($expected, true),
            var_export($value, true),
        ) . PHP_EOL;
        $this->putLine();
    }

    public function expectTrue($value, ?string $testDescription = null)
    {
        $testDescription ??= 'Expected TRUE';
        $this->expectEqual($value, true, $testDescription);
    }

    public function expectFalse($value, ?string $testDescription = null)
    {
        $testDescription ??= 'Expected FALSE';
        $this->expectEqual($value, false, $testDescription);
    }

    public function expectNull($value, ?string $testDescription = null)
    {
        $testDescription ??= 'Expected NULL';
        $this->expectEqual($value, NULL, $testDescription);
    }

    public function expectException(
        callable $callable,
        string $exception,
        ?string $testDescription = null
    ) {
        $result = function () use (
            $exception,
            $callable
        ) {
            try {
                call_user_func($callable);
                return false;
            } catch (\Throwable $th) {
                return is_a($th, $exception);
            }
        };

        $testDescription ??= "Expected instance of {$exception}";

        $this->expectTrue($result(), $testDescription);
    }
}
