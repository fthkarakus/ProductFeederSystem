<?php

namespace ProductFeederSystem\Tests;

use PHPUnit\Framework\TestCase;
use ProductFeederSystem\FileFormats\CsvFileFormat;
use ProductFeederSystem\FileFormats\JsonFileFormat;
use ProductFeederSystem\FileFormats\XmlFileFormat;

class ProductFeederSystemTest extends TestCase
{
    private $products = [
        ["id" => 1, "name" => "Product 1", "price" => 1, "category" => "Electronic"],
        ["id" => 2, "name" => "Product 2", "price" => 2, "category" => "Fashion"],
    ];

    public function testJsonPlatformOutput()
    {
        $jsonFileFormatter = new JsonFileFormat();

        $output = $jsonFileFormatter->generateFile($this->products);

        $expectedOutput = json_encode($this->products, JSON_PRETTY_PRINT);
        $this->assertEquals($expectedOutput, $output);
    }

    public function testXmlFileFormatOutput()
    {
        $xmlFormatter = new XmlFileFormat();

        $xmlOutput = $xmlFormatter->generateFile($this->products);

        $expectedXml =  '<?xml version="1.0"?>
<products>
    <product>
        <id>1</id>
        <name>Product 1</name>
        <price>1</price>
        <category>Electronic</category>
    </product>
    <product>
        <id>2</id>
        <name>Product 2</name>
        <price>2</price>
        <category>Fashion</category>
    </product>
</products>';

        $this->assertXmlStringEqualsXmlString($expectedXml, $xmlOutput);

    }

    public function testCsvFileFormatOutput()
    {
        $csvFileFormat = new CsvFileFormat();
        $csvOutput = $csvFileFormat->generateFile($this->products);

        $expectedCsv = "id;name;price;category\n1;\"Product 1\";1;Electronic\n2;\"Product 2\";2;Fashion\n";
        $this->assertEquals($expectedCsv, $csvOutput);
    }
}