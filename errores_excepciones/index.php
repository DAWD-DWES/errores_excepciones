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
            <tr><td colspan="2"><p>Muestra el valor de las variables de entorno, error_reporting, display_errors y log_errors</p></td></tr>
            <tr>
                <td></td>
                <td><!-- Escribe tu código aquí --></td>
            </tr>
            <tr><td colspan="2"><p>Cambia el valor de display_errors para comprobar que los errores ya no se visualizan en pantalla</p></td></tr>
            <tr>
                <td>$num1 = $num2;</td>
                <td><!-- Escribe tu código aquí --></td>
            <tr><td colspan="2"><p>Cambia el valor de error_reporting para que no se reporten errores de advertencia E_WARNING</td></tr>
            <tr>
                <td>$array = [1, 2, 3];
                    echo "El array es: $array";</td>
               <td><!-- Escribe tu código aquí --></td>
            </tr>
            <tr><td colspan = "2"><p>Cambia el valor de error_reporting para que solo se reporten errores de advertencia E_WARNING</p></td></tr>
            <tr>
                <td>echo $variableNoDefinida;
                    echo CONSTANTE_NO_DEFINIDA;
                </td>
                <td><!-- Escribe tu código aquí --></td>
            </tr>
            <tr><td colspan = "2"><p>Captura el error de tipo DivisionByZeroError generado por un error fatal, por ejemplo la división por 0</p></td></tr>
            <tr>
                <td>
                    $calculo = 5/0;
                </td>
                <td><!-- Escribe tu código aquí --></td>
            </tr>
            <tr><td colspan = "2"><p>Captura el error de tipo ValueError generado por un paso incorrecto de parámetros</p></td></tr>
            <tr>
                <td>$array = ['a', 'b', 'c'];
                    $result = array_rand($array, 5);
                </td>
                <td><!-- Escribe tu código aquí --></td>
            </tr>
            <tr><td colspan = "2"><p>Muestra en pantalla el resultado de invocar los métodos getMessage, getCode, getFile y getLine de un error de tipo ArgumentCountError generado por el paso de un número incorrecto de parámetros </p></td></tr>
            <tr>
                <td>$array = array_column([1,2,3]);
                </td>
                <td><!-- Escribe tu código aquí --></td>
            </tr>
            <tr><td colspan = "2"><p>Lanza y captura dos tipos de excepciones predefinidas</p></td></tr>
            <tr>
                <td>
                </td>
                <td><!-- Escribe tu código aquí --></td>
            </tr>
        </table>
    </body>
</html>
