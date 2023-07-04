<?php

//Teste de lançamento de erros
function errorDetails(Throwable $erro) :void
{
    echo 'Mensagem do erro: ' . $erro->getMessage() . PHP_EOL;
    echo 'Linha do erro: ' . $erro->getLine() . PHP_EOL;
    echo 'Histórico do erro: ' . $erro->getTraceAsString() . PHP_EOL;
    echo 'Código do erro: ' . $erro->getCode() . PHP_EOL;
    echo 'Erro anterior: ' . $erro->getPrevious() . PHP_EOL;
}

/**
 * @throws RuntimeException
 */
function funcao() :void
{
    echo 'Função chamada' . PHP_EOL;
    try {
        $erro = new RuntimeException();
        throw $erro;
    } catch (RuntimeException $erro) {
        echo 'Início 1º catch' . PHP_EOL;
        errorDetails($erro);
        throw new RuntimeException('O erro foi tratado, mas segue o aviso', $erro->getCode(), $erro);
    }
}

echo 'Início do programa' . PHP_EOL;
try {
    funcao();
} catch (RuntimeException $erro) {
    echo 'Início 2º catch' . PHP_EOL;
    errorDetails($erro);
    echo 'Fim 2º catch' . PHP_EOL;
}
echo 'Fim do programa' . PHP_EOL;
