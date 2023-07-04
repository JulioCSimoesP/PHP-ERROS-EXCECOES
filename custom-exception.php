<?php

use TreinoPHP\ErrosExcecoes\NomeMuitoGrandeException;

require_once 'NomeMuitoGrandeException.php';

//Teste de uso do finally
function nomeValido(String $string) :bool
{
    try {
        echo 'Analisando nome...' . PHP_EOL;
        if (is_numeric(substr($string, 0, 1))) {
            throw new DomainException();
        }
        echo 'Nome válido' . PHP_EOL;
        return true;
    } catch (DomainException $error) {
        echo 'Nome com caractere inválido' . PHP_EOL;
        return false;
    } finally {
        echo 'Análise completa' . PHP_EOL;
    }
}

//Teste de lançamento de erro customizado
function calculaTamanhoString(String $string) :void
{
    $length = mb_strlen($string);

    if ($length > 20) {
        throw new NomeMuitoGrandeException($length);
    }

    echo "Seu nome é " . $string . PHP_EOL;
}

$entrada = trim(fgets(STDIN));
try {
    if (nomeValido($entrada)) {
        calculaTamanhoString($entrada);
    }
} catch (NomeMuitoGrandeException $exception) {
    echo 'Erro no processamento.' . PHP_EOL;
    echo $exception->getMessage();
}