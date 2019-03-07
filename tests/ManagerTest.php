<?php
define('SERVER_ROOT',__DIR__."/../");
use PHPUnit\Framework\TestCase;

include 'ImporterTest.php';
include 'CollectionTest.php';
include 'VideoTest.php';
include 'SiteConfigsTest.php';

class ManagerTest extends TestCase {
    
    public function testAll(){
        $importerTest = new ImporterTest;
        $collectionTest = new CollectionTest;
        $videoTest = new VideoTest;
        $siteConfigsTest = new SiteConfigsTest;
        
        
        //Importer
        $importerTest->testGetImporterType();
        
        //Collections
        $collectionTest->testAddVideo();
        $collectionTest->testUnfoundVideo();
        $collectionTest->testVideosSaved();
        
        //Video
        $videoTest->testGetsAndSets();
        
        //SiteConfigs
        $siteConfigsTest->testSiteConfigs();
    }
}

