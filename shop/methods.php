<?php
function getCatalog($connect, $params = null)
{
    $categoryId = $params['category'];
    $minPrice = $params['minPrice'];
    $maxPrice = $params['maxPrice'];
    $categoryId
        ? $items = mysqli_query($connect, "
        select distinct c2.*  from category c
        join catalog_has_category chc on '$categoryId' = chc.category_id
        join catalog c2 on chc.catalog_id = c2.id
        where c2.price > '$minPrice' and c2.price < '$maxPrice'
        ")
        : $items = mysqli_query($connect, "
            select * from catalog c
            where c.price > '$minPrice' and c.price < '$maxPrice'
");
    $itemList = [];
    while ($item = mysqli_fetch_assoc($items)) {
        $itemList[] = $item;
    }
    echo json_encode($itemList);
}

function getCatalogElement($connect, $id)
{
    $item = mysqli_query($connect, "select * from catalog where id = '$id'");
    if (mysqli_num_rows($item)) {
        $response = mysqli_fetch_assoc($item);
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

function addElementCatalog($connect, $data)
{
    $name = $data['name'];
    $price = $data['price'];
    $count = $data['count'];
    $img = $data['img'];
    mysqli_query($connect, "insert into catalog (id,name, price, count, img) VALUES (NULL,'$name', '$price', '$count', '$img')");
    $res = [
        "status" => true,
        "id" => mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}

