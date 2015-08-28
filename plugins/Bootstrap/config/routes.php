<?php
use Cake\Routing\Router;

Router::plugin('Bootstrap', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
