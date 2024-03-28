<?php

if (isset($_GET['query'])) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $query = urlencode($_GET['query']);
    $api_url = "https://jsonplaceholder.typicode.com/comments?postId=3";
    $response = file_get_contents($api_url);
    $comments = json_decode($response, true);
    $filteredComments = array_filter($comments, function($comment) use ($query) {
        return stripos($comment['name'], $query) !== false;
    });
    echo json_encode($filteredComments);
}
?>
