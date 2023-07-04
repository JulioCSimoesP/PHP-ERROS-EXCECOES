<?php

//Teste de captura de erros/exceções
function errorDetails(Exception | Error $error) :void
{
    echo $error->getMessage() . PHP_EOL;
    echo $error->getLine() . PHP_EOL;
    echo $error->getTraceAsString() . PHP_EOL;
}

function funcao1($in) :void
{
    echo 'Início da função 1' . PHP_EOL;
    try {
        funcao2($in);
    } catch (TypeError $error) {
        echo 'Valor inserido não é um número' . PHP_EOL;
        errorDetails($error);
    } catch (RuntimeException $error) {
        echo 'Ocorreu RuntimeException' . PHP_EOL;
        errorDetails($error);
    }
    echo 'Fim da função 1' . PHP_EOL;
}

function funcao2($in) :void
{
    echo 'Início da função 2' . PHP_EOL;
    try {
        echo intdiv(10, $in) . PHP_EOL;
        echo 8 >> ($in * -1) . PHP_EOL;
        $array = new SplFixedArray(2);
        $array[2] = 'a';
    } catch (DivisionByZeroError | ArithmeticError) {
        echo 'Ocorreu um erro de operação' . PHP_EOL;
    }
    echo 'Fim da função 2' . PHP_EOL;
}

echo 'Início da função main' . PHP_EOL;
$entrada = trim(fgets(STDIN));
funcao1($entrada);
echo 'Fim da função main' . PHP_EOL;