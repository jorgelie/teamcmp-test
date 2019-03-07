<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase {
    
    public function testAddVideo(){
        $video = new Video;
        $collection = new Collection;
        
        $video->setId(1);
        $video->setTitle('Test');
        $video->setUrl('http://www.video.com/1');
        $video->setTags(['tag1','tag2']);
        
        $collection->addVideo($video);
        
        $this->assertSame($video, $collection->getVideoByTitle('Test'));
        
    }
    
    public function testUnfoundVideo(){
        $collection = new Collection;
        
        $this->assertSame(false, $collection->getVideoByTitle('Test'));
        
    }
    
    public function testVideosSaved(){
        $collection = new Collection;
        $video = new Video;
        
        // Insert video #1
        $video->setId(1);
        $video->setTitle('Test');
        $video->setUrl('http://www.video.com/1');
        $video->setTags(['tag1','tag2']);
        $collection->addVideo($video);
        
        // Insert video #2
        $video->setId(2);
        $video->setTitle('Test');
        $video->setUrl('http://www.video.com/1');
        $video->setTags(['tag1','tag2']);
        $collection->addVideo($video);
        
        // Insert video #3
        $video->setId(3);
        $video->setTitle('Test');
        $video->setUrl('http://www.video.com/1');
        $video->setTags(['tag1','tag2']);
        $collection->addVideo($video);
        
        $this->assertSame(3, $collection->saveToDatabase());
    }
}