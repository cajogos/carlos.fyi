<?php

$handler = SiteHandler::get();

// Main Routes
$handler->addRoute('GET', '/', 'IndexController::display', 'index');
$handler->addRoute('GET', '/contact', 'ContactController::display', 'contact');
$handler->addRoute('GET', '/skills', 'SkillsController::display', 'skills');
$handler->addRoute('GET', '/timeline', 'TimelineController::display', 'timeline');

// Other Routes
$handler->addRoute('GET', '/crypto', 'CryptoController::display', 'crypto');
$handler->addRoute('GET', '/bitcoin', 'CryptoController::redirect', 'bitcoin');
$handler->addRoute('GET', '/minesweeper', 'MinesweeperController::display', 'minesweeper');
$handler->addRoute('GET', '/rubiks-cube', 'IndexController::displayRubiksCube', 'rubiks-cube');

$handler->handleRouting();