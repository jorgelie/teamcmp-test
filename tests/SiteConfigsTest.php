<?php

use PHPUnit\Framework\TestCase;

class SiteConfigsTest extends TestCase {
    
    public function testSiteConfigs(){
        $json = '{
            "sites": {
                "glorf":{
                    "importer": "importJson",
                    "filename": "glorf",
                    "extension": ".json"
                },
                "flub":{
                    "importer": "importYaml",
                    "filename": "flub",
                    "extension": ".yaml"
                }
            },
            "feed_folder": "feed-exports/"
        }
        ';
        $siteConfigs = new SiteConfigs;
        
        $this->assertSame('feed-exports/glorf.json', $siteConfigs->getSiteConfig('glorf'));
        $this->assertSame('feed-exports/flub.yaml', $siteConfigs->getSiteConfig('flub'));
        
    }
}