<?php

class Video {

    public $id;
    public $title;
    public $url;
    public $tags = array();

    function __construct() {
        
    }

    public function getSiteConfig($site) {
        $siteConfig = $this->config['feed_folder'] . $this->config['sites'][$site]['filename'] . $this->config['sites'][$site]['extension'];
        return $siteConfig;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTags() {
        return $this->tags;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTags($tags) {
        foreach($tags as $tag){
            array_push($this->tags,trim($tag));
        }
    }

    public function save() {
        return 'Video stored correctly!';
    }

}
