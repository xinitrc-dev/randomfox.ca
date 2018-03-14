<?php
$error = $_SERVER['REDIRECT_STATUS'];
$referring_url = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
$requested_url = $_SERVER['REQUEST_URI'];
# $referring_ip = $_SERVER['REMOTE_ADDR'];
$server_name = $_SERVER['SERVER_NAME'];

switch ($error) {

# Error 400 - Bad Request
case 400:
$errorname = 'Error 400 - Bad Request';
$errordesc = '<h1>Bad Request</h1>
  <h2>Error: 400</h2>
  <p>
  The URL that you requested &#8212; http://'.$server_name.$requested_url.' &#8212; does not exist on this server.</p>';
break;

# Error 401 - Authorization Required
case 401:
$errorname = 'Error 401 - Authorization Required';
$errordesc = '<h1>Authorization Required</h1>
  <h2>Error: 401</h2>
  <p>
  The URL that you requested requires pre-authorization to access.</p>';
break;

# Error 403 - Access Forbidden
case 403:
$errorname = 'Error 403 - Access Forbidden';
$errordesc = '<h1>Access Forbidden</h1>
  <h2>Error: 403</h2>
  <p>
  Access to the URL that you requested is forbidden.</p>';
break;

# Error 404 - Page Not Found
case 404:
$errorname = 'Error 404 - Page Not Found';
$errordesc = '<h1>File Not Found</h1>
  <h2>Error: 404</h2>
  <p>
  Ooops! The page you are looking for &#8212; http://'.$server_name.$requested_url.' &#8212; cannot be found. This may be because:</p>
  <ul>
    <li>the path to the page was entered wrong;</li>
    <li>the page no longer exists; or</li>
    <li>there has been an error on the Web site.</li>
  </ul>';
break;

# Error 500 - Server Configuration Error
case 500:
$errorname = 'Error 500 - Server Configuration Error';
$errordesc = '<h1>Server Configuration Error</h1>
  <h2>Error: 500</h2>
  <p>
  The URL that you requested &#8212; <a href="http://'.$server_name.$requested_url.'">http://'.$server_name.$requested_url.'</a> &#8212; resulted in a server configuration error. It is possible that the condition causing the problem will be gone by the time you finish reading this.</p>';
break;

# Unknown error
default:
$errorname = 'Unknown Error';
$errordesc = '<h2>Unknown Error</h2>
  <p>The URL that you requested &#8212; <a href="http://'.$server_name.$requested_url.'">http://'.$server_name.$requested_url.'</a> &#8212; resulted in an unknown error. It is possible that the condition causing the problem will be gone by the time you finish reading this. </p>';

}

echo($errordesc);
if (!$referring_url == '') {
echo '<p><a href="'.$referring_url.'"><< Go back to previous page.</a></p>';
} else {
    echo '<p><a href="javascript:history.go(-1)"><< Go back to previous page.</a></p>';
}
?>