<?php

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */

/* Home Page */
Router::get('/','App\Controllers\PageHome@index');
Router::get('/home','App\Controllers\PageHome@index');
Router::get('/index','App\Controllers\PageHome@index');
Router::get('/home.html','App\Controllers\PageHome@index');
Router::get('/index.html','App\Controllers\PageHome@index');

/* Admin Page */
Router::get('/admin','App\Controllers\PageAdmin@dashboard');
Router::get('/admin/~dashboard','App\Controllers\PageAdmin@dashboard');
Router::get('/admin/~preference','App\Controllers\PageAdmin@preference');
Router::get('/admin/~about-us','App\Controllers\PageAdmin@aboutUs');



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
