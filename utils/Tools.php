<?php

Class Tools {

    public function readPrompt() {
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        return $line;
    }

    public function getConfigs() {
        $str = file_get_contents(SERVER_ROOT.'config/config.json');
        $config = json_decode($str, true);
        return $config;
    }

}
