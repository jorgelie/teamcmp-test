<?php

use PHPUnit\Framework\TestCase;
include SERVER_ROOT.'classes/Importer.php';
include SERVER_ROOT.'utils/Tools.php';

class ImporterTest extends TestCase {
    
    public function testGetImporterType(){
        $importer = new Importer;
        
        $this->assertSame('importJson', $importer->getImporterType('glorf'));
        $this->assertSame('importYaml', $importer->getImporterType('flub'));
        $this->assertSame(false, $importer->getImporterType('other'));
    }
}