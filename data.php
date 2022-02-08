<?php

require 'init.php';

use Midnox\Controller\ApartmentController as Apartment;
use Midnox\Controller\CarController as Car;
use Midnox\Controller\InsuranceController as Insurance;
use Midnox\Controller\ProductController as Product;
use Midnox\Controller\ServiceController as Service;

$apartment = new Apartment($pdo);
$car = new Car($pdo);
$insurance = new Insurance($pdo);
$product = new Product($pdo);
$service = new Service($pdo);

$data = [];

$data['apartment'] = $apartment->fetchChartData('0000-00-00', '9999-12-31');
$data['car'] = $car->fetchChartData('0000-00-00', '9999-12-31');
$data['insurance'] = $insurance->fetchChartData('0000-00-00', '9999-12-31');
$data['product'] = $product->fetchChartData('0000-00-00', '9999-12-31');
$data['service'] = $service->fetchChartData('0000-00-00', '9999-12-31');

echo json_encode($data, JSON_NUMERIC_CHECK);
