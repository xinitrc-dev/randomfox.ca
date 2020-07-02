<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$files = glob('../images/*');
if ($files) {
    $FOX_NUM = count($files);
    $random_fox_index = rand(1, $FOX_NUM);

    $image_path = 'https://randomfox.ca/images/'.$random_fox_index.'.jpg';
    $link = 'https://randomfox.ca/?i='.$random_fox_index;
} else {
    $image_path = null;
    $link = null;
}
$data = ['image' => $image_path, 'link' => $link];

echo json_encode($data);
