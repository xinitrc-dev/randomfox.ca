<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$MAX_ALLOWED_COUNT = 20;
$valid_request = FALSE;
$files = glob('../../../images/*');
if ($files and isset($_GET['count'])) {
    $FOX_NUM = count($files);
    if (ctype_digit($_GET['count'])){
        if ($_GET['count'] <= $MAX_ALLOWED_COUNT and $_GET['count'] > 0){
            $foxNums = array();
            $image_paths = array();
            $links = array();
            for ($x = 0; $x < $_GET["count"]; $x++) {
                do {
                    $random_number = rand(1, $FOX_NUM);
                } while (in_array( $random_number ,$foxNums ));
                array_push($foxNums,$random_number);
                array_push($image_paths,'https://randomfox.ca/images/'.$random_number.'.jpg');
                array_push($links,'https://randomfox.ca/?i='.$random_number);
                $valid_request = TRUE;
            } 
        } else {
            if ($_GET['count'] <= 0){
                header('HTTP/1.1 420 Need to specify COUNT between 0 and '.$MAX_ALLOWED_COUNT.'');
                $error_msg = '\'count\' needs to be specified between 0 and '.$MAX_ALLOWED_COUNT.'';
            } else {
                header('HTTP/1.1 420 Need to specify COUNT within'.$MAX_ALLOWED_COUNT.'');
                $error_msg = '\'count\' needs to be specified within '.$MAX_ALLOWED_COUNT.'';
            }
        }
    } else {
        header('HTTP/1.1 420 Need to specify COUNT 0 and '.$MAX_ALLOWED_COUNT.'');
        $error_msg = '\'count\' needs to be specified 0 and '.$MAX_ALLOWED_COUNT.'';
    }
} else {
    $foxNums = null;
    $image_paths = null;
    $links = null;
    if (ctype_digit($_GET['count'])){}
    header('HTTP/1.1 420 Need to specify COUNT');
    $error_msg = '\'count\' needs to be specified';
}
if ($valid_request == TRUE){
    $data = array('images' => $image_paths, 'links' => $links);
    
} else {
    $data = array('error' => $error_msg,'status' => '420');
}
echo json_encode($data);
