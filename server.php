<?php
require_once 'vendor/autoload.php';

$uri = $argv[1];

$server = new Hoa\Socket\Server('tcp://' . $uri);
$server->connectAndWait();

$fp = fopen('data.bin', 'a');

while (true) {
    foreach ($server->select() as $node) {
        $line = $server->readLine();

        if (empty($line)) {
            $server->disconnect();
            continue;
        }

        fwrite($fp, $line.PHP_EOL);
    }
}