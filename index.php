<?php

define('SERVER_ROOT',__DIR__."/");

include SERVER_ROOT.'utils/Tools.php';
include SERVER_ROOT.'classes/Importer.php';

$tools = new Tools;
$importer = new Importer;
echo "TeamCMP Importer \n=============== \n Type the name of the site and press enter: ";
$site = $tools->readPrompt();
$importer->getSite($site);
?>
