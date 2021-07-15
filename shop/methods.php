<?php
function getCatalog($connect)
{
    $posts = mysqli_query($connect, 'select * from catalog');
    $postsList = [];
    while ($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    echo json_encode($postsList);
}

function getCatalogElement($connect, $id)
{
    $post = mysqli_query($connect, "select * from catalog where id = '$id'");
    if (mysqli_num_rows($post)) {
        $response = mysqli_fetch_assoc($post);
        echo json_encode($response);
    } else {
        http_response_code(404);
        $res = [
            'status' => false,
            'message' => 'CatalogElementNotFound'
        ];
        echo json_encode($res);
    }

}

