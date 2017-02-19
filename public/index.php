<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/init.php';

// Routing is done using AltoRouter
// See more: http://altorouter.com/usage/mapping-routes.html
$router = new AltoRouter();

// map($method, $route, $target, $name = null)
$router->map('GET', '/', 'handleIndexPage', 'index');
$router->map('GET', '/contact', 'handleContactPage', 'contact');

handleRouting($router);

exit;