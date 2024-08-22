<?php

namespace ProductFeederSystem;

class ResponseFormatter
{
    public function formatResponse(string $formatName, string $fileContent): void
    {
        switch ($formatName) {
            case 'json':
                header('Content-Type: application/json');
                break;
            case 'xml':
                header('Content-Type: text/xml');
                break;
            case 'csv':
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment;filename="products.csv"');
                break;
            default:
                http_response_code(400);
                echo json_encode(['error' => 'Invalid format']);
                exit;
        }
        echo $fileContent;
    }
}