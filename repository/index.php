<?php
$dotenvFile = __DIR__ . DIRECTORY_SEPARATOR . '.env';
if (is_file($dotenvFile)) {
    $handler = fopen($dotenvFile, 'r');
    if ($handler !== false) {
        while (($line = fgets($handler)) !== false) {
            list($name, $value) = explode('=', $line, 2);
            $_ENV[$name] = trim($value);
        }
    }
    fclose($handler);
}
?>
<!doctype html>
<html>
    <head>
        <title>Without vault</title>
    </head>
    <body>
            <pre><?php var_dump($_ENV); ?></pre>
    </body>
</html>
