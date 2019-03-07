<?php

class Collection {

    private $items = array();

    public function addVideo($video, $key = null) {
        if ($key == null) {
            $this->items[] = $video;
        } else {
            if (isset($this->items[$key])) {
                exit('Key ' . $key . ' already used');
            } else {
                $this->items[$key] = $video;
            }
        }
    }

    public function saveToDatabase() {
        //Saving to Database
        $count = count($this->items);
        echo "\n" . $count . ' videos saved to database';
        return $count;
    }
    
    public function getVideoByTitle($title){
        foreach($this->items as $video){
            if($video->title == $title){
                return $video;
            } 
        }
        
        return false;
    }

}
