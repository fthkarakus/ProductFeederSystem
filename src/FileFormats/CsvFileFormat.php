<?php

namespace ProductFeederSystem\FileFormats;

class CsvFileFormat implements FileFormatInterface
{
    public function generateFile(array $products): string
    {
        $output = fopen('php://temp', 'r+');
        if ($output === false) {
            throw new \RuntimeException('Unable to open output stream.');
        }

        fputcsv($output, ['id', 'name', 'price', 'category'], ';');

        foreach ($products as $product) {
            fputcsv($output, $product, ';');
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        return $csvContent;
    }
}