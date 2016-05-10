<?php

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */

Router::get('/','App\Controllers\Home@index');
Router::get('/home','App\Controllers\Home@index');

/* Language */
Router::any('lang/(:any)', 'App\Controllers\Language@change');

/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
