<?php

namespace ProductFeederSystem\FileFormats;

interface FileFormatInterface
{
    public function generateFile(array $products): string;
}