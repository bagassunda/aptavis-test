<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Standings::index');
$routes->get('clubs', 'Clubs::index');
$routes->post('clubs/add', 'clubs::add');
$routes->get('matches', 'Matches::index');
$routes->post('matches/add', 'matches::add');