<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Guests;
use App\Controllers\News;
use App\Controllers\Pages;

$routes->get('guests', [Guests::class, 'index']); 
$routes->get('guests/guest', [Guests::class, 'guest']); // Add this line
$routes->post('guests', [Guests::class, 'create']); // Add this line
$routes->get('guests/(:segment)', [Guests::class, 'show']);


$routes->get('news', [News::class, 'index']);  
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line         
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
