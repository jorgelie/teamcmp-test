<?php

class FileValidator {

    public function validateFile($str, $type) {
        switch ($type) {
            case 'json':
                echo "Validating file \n";
                sleep(1);
                $json = json_decode($str, true);
                if ($json == NULL) {
                    exit('JSON file is not valid');
                }
                if (!array_key_exists('videos', $json) || empty($json['videos'])) {
                    exit('There are no videos in JSON file');
                }
                echo "File validated! \n";
                break;
            case 'yaml':
                echo "Validating file \n";
                sleep(1);
                if (empty($str)) {
                    exit('There are no videos in YAML file');
                }
                echo "File validated! \n";
                break;
            default:
                echo "Importing from " . $company . " is not implemented yet";
                break;
        }
    }

}
