<?php

namespace ProductFeederSystem;

interface FileFormatInterface
{
    public function generateFile(array $products): string;
}