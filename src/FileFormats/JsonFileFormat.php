<?php

namespace ProductFeederSystem\FileFormats;

class JsonFileFormat implements FileFormatInterface
{
    public function generateFile(array $products): string
    {
        return json_encode($products, JSON_PRETTY_PRINT);
    }
}