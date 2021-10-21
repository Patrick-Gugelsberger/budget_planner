<?php

require_once 'vendor/autoload.php';
require 'autoload.php';
require 'config/database.php';

$loader = new \Twig\Loader\FilesystemLoader('./template');
$twig = new \Twig\Environment($loader, [
]);