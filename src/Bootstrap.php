<?php declare(strict_types = 1);

namespace PatrickLouys;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';

/**
 * Register the error handler
 */
$whoops = new \Whoops\Run;
if($environment !== 'production') {
    $whoops->pushHandler( new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e) {
        echo 'Toto: Friendly error page and send an email to the developer';
    });
}
$whoops->register();

//throw new \Exception;

$request = new \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new \Http\HttpResponse;

$content = '<h1>Hello World!</h1>';
//$response->setContent($content);
$response->setContent('404 - Page not found');
$response->setStatusCode(404);


foreach($response->getHeaders() as $header) {
    header($header, false);
}
echo $response->getContent();