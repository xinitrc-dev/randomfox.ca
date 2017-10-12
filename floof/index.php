<?php
header('Content-Type: application/json');

$FOX_NUM = (int)file_get_contents('../script/script.js', NULL, NULL, 16, 3);
$random_fox_index = rand(1, $FOX_NUM);

$image_path = 'http://randomfox.ca/images/'.$random_fox_index.'.jpg';
$link = 'http://randomfox.ca/?i='.$random_fox_index;
$data = ['image' => $image_path, 'link' => $link];

echo json_encode($data);