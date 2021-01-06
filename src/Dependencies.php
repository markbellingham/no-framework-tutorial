<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->alias('PatrickLouys\Template\Renderer', 'PatrickLouys\Template\TwigRenderer');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);

$injector->define('PatrickLouys\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->alias('PatrickLouys\Page\PageReader', 'PatrickLouys\Page\FilePageReader');
$injector->share('PatrickLouys\Page\FilePageReader');

$injector->delegate('\Twig\Environment', function () use ($injector) {
    $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
    $twig = new \Twig\Environment($loader);
    return $twig;
});

$injector->alias('PatrickLouys\Template\FrontendRenderer', 'PatrickLouys\Template\FrontendTwigRenderer');
$injector->alias('PatrickLouys\Menu\MenuReader', 'PatrickLouys\Menu\ArrayMenuReader');
$injector->share('PatrickLouys\ArrayMenuReader');

return $injector;