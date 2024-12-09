<?php

function myExceptionHandler(Throwable $e) {
    error_log("{$e->getMessage()} in {$e->getFile()} on line {$e->getLine()}");
    http_response_code(500);
    if (filter_var(ini_get('display_errors'), FILTER_VALIDATE_BOOLEAN)) {
        echo $e;
    } else {
        echo "<h1>500 Error Interno del Servidor</h1>
Ha ocurrido un error interno del servidor.<br>
Por favor, inténtelo más tarde.";
    }
    exit;
}

register_shutdown_function(function () {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        error_log("Fatal error: {$error['message']} in {$error['file']} on line {$error['line']}");
        http_response_code(500);
        echo "<h1>500 Error Interno del Servidor</h1>
Ha ocurrido un error interno del servidor.<br>
Por favor, inténtelo más tarde.";
    }
});

set_exception_handler('myExceptionHandler');

set_error_handler(function ($level, $message, $file = '', $line = 0) {
    if (!(error_reporting() & $level)) {
// If the error level is not included in error_reporting, don't handle it
        return;
    }
    if ($level & (E_USER_NOTICE | E_WARNING | E_STRICT | E_DEPRECATED)) {
// Handle non-fatal errors (log them or take other actions)
// For example, log the error:
        error_log("Non-fatal error: [$level] $message in $file on line $line\n");
        return false; // Return false to continue script execution
    } else {
// Convert other errors to ErrorException and throw them
        throw new ErrorException($message, 0, $level, $file, $line);
    }
}, E_ALL);
