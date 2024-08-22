<?php

namespace ProductFeederSystem;

use ProductFeederSystem\FileFormatInterface;

class ProductFeederSystem
{
    private $fileFormats = [];

    public function registerFormat(string $formatName, FileFormatInterface $fileFormat): void
    {
        $this->fileFormats[$formatName] = $fileFormat;
    }

    public function getFileFormat(string $formatName): ?FileFormatInterface
    {
        return $this->fileFormats[$formatName] ?? null;
    }

    public function hasFormat(string $formatName): bool
    {
        return isset($this->fileFormats[$formatName]);
    }

}
