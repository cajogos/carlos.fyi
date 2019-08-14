<?php

$handler = SiteHandler::get();

// Main Routes
$handler->addRoute('GET', '/', 'MainController::displayIndex', 'index');
$handler->addRoute('GET', '/contact', 'MainController::displayContact', 'contact');
$handler->addRoute('GET', '/skills', 'MainController::displaySkills', 'skills');
$handler->addRoute('GET', '/timeline', 'MainController::displayTimeline', 'timeline');

// Other Routes
$handler->addRoute('GET', '/rubiks-cube', 'MainController::displayRubiksCube', 'rubiks-cube');
$handler->addRoute('GET', '/minesweeper', 'MainController::displayMinesweeper', 'minesweeper');
$handler->addRoute('GET', '/crypto', 'MainController::displayCryptocurrencies', 'crypto');

$handler->handleRouting();