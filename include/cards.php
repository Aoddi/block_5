<?php
$pathToUpload = '/homework/block_5/upload/';
$path = $_SERVER['DOCUMENT_ROOT'] . $pathToUpload;

$upload = (scandir($path));
$upload = array_slice($upload, 2);

$cards = [];

foreach ($upload as $file) {
    $cards[] = [
        'name' => substr($file, 0, -4),
        'path' => $pathToUpload . $file,
    ];
}
