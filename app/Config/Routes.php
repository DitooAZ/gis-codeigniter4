<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Lokasi::index');
$routes->setDefaultController('Lokasi');
$routes->setAutoRoute(true);
$routes->get('lokasi/exportToCSV', 'Lokasi::exportToCSV');
$routes->get('/chart', 'Home::chart');
$routes->get('/geojson', 'GeojsonController::index');


