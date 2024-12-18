<?php
// include "error_handler.php";
// Entorno de producción
/* ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); */

// Entorno de desarrollo
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Programación con errores y excepciones</title>
        <meta name="viewport" content="width=device-width">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h2>Programación con errores y excepciones</h2>
        <table>
            <!--
            -->
            <tr><td colspan="2"><p>Muestra el valor de las variables de entorno, error_reporting, display_errors y log_errors</p></td></tr>
            <tr>
                <td></td>
                <td><?= var_dump(error_reporting()) ?>
                    <?= var_dump(ini_get('display_errors')) ?>
                    <?= var_dump(ini_get('log_errors')) ?>
                </td>
            </tr>
            <tr><td colspan="2"><p>Cambia el valor de display_errors para comprobar que los errores ya no se visualizan en pantalla</p></td></tr>
            <td>$num1 = $num2;</td>
            <td><?php
                ini_set('display_errors', 0);
                $num1 = $num2;
                ini_set('display_errors', 1);
                ?></td>
        </tr>
        <tr><td colspan="2"><p>Cambia el valor de error_reporting para que no se reporten errores de advertencia E_WARNING</p></td></tr>
        <tr>
            <td>$array = [1, 2, 3];
                echo "El array es: $array";</td>
            <td><?php
                error_reporting(E_ALL & ~E_WARNING);
                $array = [1, 2, 3];
                echo "El array es: $array";
                error_reporting(E_ALL);
                ?></td>
        </tr>
            <tr><td colspan = "2"><p>Genera otros tipos de errores incluido algún error fatal para ver la diferencia en el proceso de ejecución del script</p></td></tr>
            <tr>
                <td>echo $variableNoDefinida;
                    echo CONSTANTE_NO_DEFINIDA;
                </td>
                <td><?php
                    echo $variableNoDefinida;
                    echo "La ejecución sigue";
                    echo CONSTANTE_NO_DEFINIDA;
                    echo "La ejecución no sigue";
                    ?></td>
            </tr>
        <tr><td colspan = "2"><p>Captura el error de tipo DivisionByZeroError generado por un error fatal, por ejemplo la división por 0</p></td></tr>
        <tr>
            <td>
                $calculo = 5/0;
            </td>
            <td><?php
                //Probar a no capturar la excepción
                try {
                    $calculo = 5 / 0;
                } catch (DivisionByZeroError $ex) {
                    echo $ex->getMessage(); // Mensaje volcado en la página de salida
                }
                ?>
            </td>
        </tr>
        <tr><td colspan = "2"><p>Captura el error de tipo ValueError generado por un paso incorrecto de parámetros</p></td></tr>
        <tr>
            <td>$array = ['a', 'b', 'c'];
                $result = array_rand($array, 5);
            </td>
            <td><?php
                try {
                    $array = ['a', 'b', 'c'];
                    $result = array_rand($array, 5);
                } catch (ValueError $ex) {
                    echo "Mas informacion";
                    echo $ex->getMessage(); // Mensaje volcado en la página de salida
                }
                ?></td>
        </tr>
        <tr><td colspan = "2"><p>Muestra en pantalla el resultado de invocar los métodos getMessage, getCode, getFile y getLine de un error de tipo ArgumentCountError generado por el paso de un número incorrecto de parámetros </p></td></tr>
        <tr>
            <td>$array = array_column([1,2,3]);
            </td>
            <td><?php
        try {
            $array = array_column([1, 2, 3]);
        } catch (Error $ex) {
            echo $ex->getMessage() . "</br>";
            echo $ex->getCode() . "</br>";
            echo $ex->getFile() . "</br>";
            echo $ex->getLine() . "</br>";
            print_r($ex->getTrace());
            echo $ex->getTraceAsString();
        }
        ?></td>
        </tr>
        <tr><td colspan = "2"><p>Lanza y captura dos tipos de excepciones predefinidas</p></td></tr>
        <tr>
            <td>
            </td>
            <td><?php
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

        try {
            echo dividir(10, 2); // Denominador inválido
            $lista = [1, 2, 3];
            echo obtenerElemento($lista, 5); // Índice fuera de los límites
        } catch (InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage();
        } catch (OutOfBoundsException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
            </td>
        </tr>
        <tr><td colspan = "2"><p>Crear alguna excepción de usuario y lanzarla en el programa</p></td></tr>
        <tr>
            <td></td>
            <td><?php

// Definición de una excepción personalizada
        class MiExcepcionPersonalizada extends Exception {

            private $codigoUsuario;

            public function __construct($mensaje, $codigoUsuario, $code = 0, Throwable $previous = null) {
                parent::__construct($mensaje, $code, $previous);
                $this->codigoUsuario = $codigoUsuario;
            }

            public function getCodigoUsuario() {
                return $this->codigoUsuario;
            }
        }

// Función que lanza la excepción personalizada
        function procesarUsuario($idUsuario) {
            if ($idUsuario < 1) {
                throw new MiExcepcionPersonalizada("ID de usuario inválido.", $idUsuario);
            }
            echo "Usuario con ID $idUsuario procesado correctamente.\n";
        }

// Programa principal
        try {
            // Intento de procesar un usuario con ID válido
            procesarUsuario(5);
            // Intento de procesar un usuario con ID inválido
            procesarUsuario(0);
        } catch (MiExcepcionPersonalizada $e) {
            echo "Se capturó una excepción personalizada: " . $e->getMessage() . "</br>";
            echo "Código de usuario asociado: " . $e->getCodigoUsuario() . "</br>";
        } catch (Exception $e) {
            // Manejo de excepciones genéricas
            echo "Se produjo una excepción general: " . $e->getMessage() . "</br>";
        } finally {
            echo "Ejecución finalizada.</br>";
        }
        ?>
            </td>
        </tr> 
            <!-- 
            -->
        </table>
    </body>
</html>
