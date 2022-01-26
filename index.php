<?php
require 'init.php';

ini_set('display_errors', '1');

echo $twig->render('index.twig', array(
    'title' => 'Startseite'
));
