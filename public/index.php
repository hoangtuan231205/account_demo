<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../app/Core/App.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/Database.php';

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/Controllers/' . $class . '.php',
        __DIR__ . '/../app/Models/' . $class . '.php',
    ];
    foreach ($paths as $p) {
        if (file_exists($p)) require_once $p;
    }
});

$app = new App();
$app->run();
