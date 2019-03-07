<?php

use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase {
    
    public function testGetsAndSets(){
        $video = new Video;
        
        $video->setId(1);
        $video->setTitle('Test');
        $video->setUrl('http://www.video.com/1');
        $video->setTags(['tag1','tag2']);
        
        $this->assertSame(1, $video->getId());
        $this->assertSame('Test', $video->getTitle());
        $this->assertSame('http://www.video.com/1', $video->getUrl());
        $this->assertSame(['tag1','tag2'], $video->getTags());
    }
}