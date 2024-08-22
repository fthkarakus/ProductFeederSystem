<?php

require 'vendor/autoload.php';

use ProductFeederSystem\ProductFeederSystem;
use ProductFeederSystem\RequestHandler;
use ProductFeederSystem\ResponseFormatter;
use ProductFeederSystem\JsonFileFormat;
use ProductFeederSystem\XmlFileFormat;
use ProductFeederSystem\CsvFileFormat;


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$requestHandler = new RequestHandler();
$responseFormatter = new ResponseFormatter();

$formatName = $requestHandler->getFormatName();

$productJson = file_get_contents('products.json');
$products = json_decode($productJson, true);

$feederSystem = new ProductFeederSystem();

$feederSystem->registerFormat('json', new JsonFileFormat());
$feederSystem->registerFormat('xml', new XmlFileFormat());
$feederSystem->registerFormat('csv', new CsvFileFormat());

if ($formatName && $feederSystem->hasFormat($formatName)) {
    $fileFormat = $feederSystem->getFileFormat($formatName);
    $fileContent = $fileFormat->generateFile($products);
    $responseFormatter->formatResponse($formatName, $fileContent);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid format']);
}