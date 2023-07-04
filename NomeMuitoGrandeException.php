<?php

namespace TreinoPHP\ErrosExcecoes;

class NomeMuitoGrandeException extends \DomainException
{
    public function __construct(int $length)
    {
        $message = 'Seu nome possui ' . $length . ' caracteres, mas o limite do sistema é 20.' . PHP_EOL;
        parent::__construct($message);
    }
}