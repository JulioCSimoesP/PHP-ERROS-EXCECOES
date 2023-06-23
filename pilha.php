<?php

//Teste de ordem da pilha de execução
function funcao1 () {
    echo 'Início da função 1' . PHP_EOL;
    funcao2();
    echo 'Fim da função 1' . PHP_EOL;
}

function funcao2 () {
    echo 'Início da função 2' . PHP_EOL;
    var_dump(debug_backtrace());
    echo 'Fim da função 2' . PHP_EOL;
}

echo 'Início da função main' . PHP_EOL;
funcao1();
echo 'Fim da função main' . PHP_EOL;