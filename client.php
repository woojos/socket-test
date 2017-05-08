<?php
require_once 'vendor/autoload.php';

$uri = $argv[1];
$body = $argv[2];

$client = new Hoa\Socket\Client('tcp://'.$uri);
$client->connect();

$client->writeLine($body);
