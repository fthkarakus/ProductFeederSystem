<?php

namespace ProductFeederSystem;

use ProductFeederSystem\FileFormatInterface;
use SimpleXMLElement;

class XmlFileFormat implements FileFormatInterface
{
    public function generateFile(array $products): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><products/>');

        foreach ($products as $product) {
            $productNode = $xml->addChild('product');
            foreach ($product as $key => $value) {
                $productNode->addChild($key, htmlspecialchars($value));
            }
        }

        return $xml->asXML();
    }
}