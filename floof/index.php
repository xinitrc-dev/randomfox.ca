<?php
header('Content-Type: application/json');

$files = glob('../images/*');
if ($files) {
    $FOX_NUM = 121;
    $random_fox_index = rand(1, $FOX_NUM);

    $image_path = 'https://github.com/xinitrc-dev/randomfox.ca/blob/master/images/'.$random_fox_index.'.jpg?raw=true';
    $link = 'https://github.com/xinitrc-dev/randomfox.ca/blob/master/images/'.$random_fox_index'.jpg';
} else {
    $image_path = null;
    $link = null;
}
$data = ['image' => $image_path, 'link' => $link];

echo json_encode($data);
