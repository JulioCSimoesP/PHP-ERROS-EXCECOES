<?php

//Configurações de tratamento de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', './erros.txt');

//Tratador de erros customizado
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    echo match ($errno) {
        E_WARNING => 'Ocorreu um warning' . PHP_EOL
    };
});

echo $var;
echo @$array[20];
echo CONSTANT;