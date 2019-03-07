<?php

class SiteConfigs {

    private $config;

    function __construct() {
        $this->config = Tools::getConfigs();
    }

    public function getSiteConfig($site) {
        $path = $this->config['feed_folder'] . $this->config['sites'][$site]['filename'] . $this->config['sites'][$site]['extension'];
        return $path;
    }

}
