<?php
define('WP_USE_THEMES', false );
require('../../../../wp-load.php');

$response = array('status' => 'error');

if (isset($_POST)) {
    $_SESSION['language'] = $_POST['type'];
    $response = array('status' => 'ok');
}

echo json_encode($response);
