<?php

ob_start();

require __DIR__ . '/vendor/autoload.php';

use Source\Core\MyRouter;

$route = new MyRouter(url(), ":");

/**
 * Routes
 */
// Site
$route->namespace("Source\Controllers");
$route->group(null);
$route->get("/home", "Home:index");

//Auth
$route->namespace("Source\Controllers\Auth");
$route->group(null);
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");
$route->post("/logout", "Login:logout");
$route->get("/admin", "Admin:index");
/**
 * Route
 */
$route->dispatch();

/**
 * Error Redirect
 */
$route->error();

ob_end_flush();