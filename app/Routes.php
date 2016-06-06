<?php

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */

/* Error Page */
Router::get('/404','App\Controllers\PageError@error404');

/* Home Page */
Router::get('/','App\Controllers\PageHome@index');
Router::get('/home','App\Controllers\PageHome@index');
Router::get('/index','App\Controllers\PageHome@index');
Router::get('/home.html','App\Controllers\PageHome@index');
Router::get('/index.html','App\Controllers\PageHome@index');

/* User Login Page */
Router::get('/admin/login','App\Controllers\PageLogin@login');
Router::post('/admin/login','App\Controllers\User@login');
Router::get('/admin/logout','App\Controllers\User@logout');

/* Admin Page */
Router::get('/admin/','App\Controllers\PageAdmin@dashboard');
Router::get('/admin/~dashboard','App\Controllers\PageAdmin@dashboard');
Router::get('/admin/~preference','App\Controllers\PageAdmin@preference');
Router::get('/admin/~about-us','App\Controllers\PageAdmin@aboutUs');
Router::get('/admin/~language','App\Controllers\PageAdmin@language');

/* User Admin Page */
Router::get('/admin/~user','App\Controllers\PageAdmin@user');
/* Role Admin Page */
Router::get('/admin/~role','App\Controllers\PageAdmin@role');


/* Language */	
Router::any('lang/(:any)', 'App\Controllers\Language@change');

/* Busines */
/* User */
Router::get('/user/~getAll', 'App\Controllers\User@displayUsers');
Router::get('/admin/~showInfo','App\Controllers\PageAdmin@showInfo');
Router::get('/admin/~create','App\Controllers\PageAdmin@createPage');
Router::get('/admin/~edit','App\Controllers\PageAdmin@editPage');
Router::post('/user/~create','App\Controllers\User@create');
Router::get('/user/~checkUsername','App\Controllers\User@checkUsername');
Router::get('/user/~checkEmail','App\Controllers\User@checkEmail');
Router::post('/user/~delete','App\Controllers\User@delete');
Router::post('/user/~edit','App\Controllers\User@edit');

/* Role */
Router::get('/role/~getAll', 'App\Controllers\Role@displayRoles');
Router::post('/role/~create','App\Controllers\Role@create');
Router::post('/role/~edit','App\Controllers\Role@edit');
Router::post('/role/~delete','App\Controllers\Role@delete');

// Router::get('/user/~checkUsername','App\Controllers\User@checkUsername');
// Router::get('/user/~checkEmail','App\Controllers\User@checkEmail');
// Router::post('/user/~delete','App\Controllers\User@delete');
// Router::post('/user/~edit','App\Controllers\User@edit');

/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
