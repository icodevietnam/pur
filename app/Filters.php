<?php

use Core\Route;


Route::filter('test', function($route) {
    echo '<pre>' .var_export($route, true) .'</pre>';
});