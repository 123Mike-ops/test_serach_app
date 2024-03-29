<?php

if (isset($_GET['query'])) {
    $query = urlencode($_GET['query']);
    $api_url = "https://jsonplaceholder.typicode.com/comments?postId=3";
    $response = file_get_contents($api_url);
    if ($response === FALSE) {
        echo json_encode(array('error' => 'Failed to fetch data from the API'));
    } else {
        echo $response;
    }
} else {

    echo json_encode(array('error' => 'Query parameter is not set'));
}
?>
