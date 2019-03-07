<?php

include SERVER_ROOT.'vendor/Yaml.php';
include SERVER_ROOT.'classes/FileValidator.php';
include SERVER_ROOT.'classes/SiteConfigs.php';
include SERVER_ROOT.'classes/Video.php';
include SERVER_ROOT.'classes/Collection.php';

Class Importer {

    public function getSite($site) {
        $cleanSite = trim(strtolower($site));
        $importer = $this->getImporterType($cleanSite);
        if (method_exists($this, $importer)) {
            $this->$importer($cleanSite);
        } else {
            exit('Site/Importer not implemented');
        }
    }

    public function importJson($site) {
        $json = $this->processJsonFile($site);
        $tagCount = 1;
        $collection = new Collection;
        foreach ($json['videos'] as $key => $videoEach) {
            $video = new Video();
            $tagsArray = array();
            echo "\n\nImporting video #" . ($key + 1) . "\n\n";
            echo "Title:" . $videoEach['title'] . "\n";
            $video->setTitle($videoEach['title']);
            echo "Url:" . $videoEach['url'] . "\n";
            $video->setUrl($videoEach['url']);
            if (!empty($videoEach['tags'])) {
                foreach ($videoEach['tags'] as $keyTag => $tag) {
                    echo " - Tag #" . ($keyTag + 1) . ": " . $tag . "\n";
                    array_push($tagsArray, $tag);
                }
                $video->setTags($tagsArray);
            }
            $tagCount = 1;
            sleep(1);
            $collection->addVideo($video);
        }
        $collection->saveToDatabase();
    }

    public function importYaml($site) {
        $yaml = $this->processYamlFile($site);
        $collection = new Collection;
        foreach ($yaml as $key => $videoEach) {
            $video = new Video();
            echo "\n\nImporting video #" . ($key + 1) . "\n\n";
            echo "Title:" . $videoEach['name'] . "\n";
            $video->setTitle($videoEach['name']);
            echo "Url:" . $videoEach['url'] . "\n";
            $video->setUrl($videoEach['url']);
            if (!empty($videoEach['labels'])) {
                echo "Labels:" . $videoEach['labels'] . "\n";
                $video->setTags(explode(',',$videoEach['labels']));
            }
            sleep(1);
            $collection->addVideo($video);
        }

        $collection->saveToDatabase();
    }

    public function getImporterType($site) {
        if (isset(Tools::getConfigs()['sites'][$site])) {
            $importer = Tools::getConfigs()['sites'][$site]['importer'];
            if ($importer) {
                return $importer;
            } else {
                exit('No importer found for this site');
            }
        } else {
            //Site not implemented
            return false;
        }
    }

    private function processJsonFile($site) {
        $fileValidator = new FileValidator;
        $siteConfig = new SiteConfigs;
        $configs = $siteConfig->getSiteConfig($site);
        $processedJson = file_get_contents($configs);
        $fileValidator->validateFile($processedJson, 'json');
        sleep(1);
        echo "Importing videos from Glorf\n";
        return json_decode($processedJson, true);
    }

    private function processYamlFile($site) {
        $fileValidator = new FileValidator;
        $siteConfig = new SiteConfigs;
        $yaml = new Yaml();
        $processedYaml = $yaml->loadfile($siteConfig->getSiteConfig($site));
        $fileValidator->validateFile($processedYaml, 'yaml');
        sleep(1);
        echo "Importing videos from Flub\n";
        return $processedYaml;
    }

}
