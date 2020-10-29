<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/homework/block_5/upload';
$upload = (scandir($path));

$card = [
    'name' => '',
    'path' => '',
];

for ($i = 2; $i < count($upload); $i++) {
    $card['name'] = substr($upload[$i], 0, -4);
    $card['path'] = '/homework/block_5/upload/' . $upload[$i];
    $cards[] = $card;
}