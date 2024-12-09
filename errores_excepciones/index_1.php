<?php
include "error_handler.php";

ini_set('display_errors', 1);

function dividir($numerador, $denominador) {
    if (!is_numeric($numerador) || !is_numeric($denominador)) {
        throw new InvalidArgumentException("Los argumentos deben ser números.");
    }
    if ($denominador == 0) {
        throw new InvalidArgumentException("El denominador no puede ser cero.");
    }
    return $numerador / $denominador;
}

function obtenerElemento($array, $indice) {
    if (!isset($array[$indice])) {
        throw new OutOfBoundsException("El índice $indice está fuera de los límites del array.");
    }
    return $array[$indice];
}

// echo dividir(10, 0); // Denominador inválido
$lista = [1, 2, 3];
// echo obtenerElemento($lista, 5); // Índice fuera de los límites

$num1 = $num2;
