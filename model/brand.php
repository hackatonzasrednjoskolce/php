<?php

function getAllBrands(PDO $db): array {
    $brandsStatement = $db->prepare('SELECT * FROM car_brand');
    $brandsStatement->execute();

    return $brandsStatement->fetchAll();
}

function addBrand(PDO $db, $data) {
    $insertStatement = $db->prepare('INSERT INTO car_brand (title) VALUES (:title)');
    $insertStatement->execute([
        'title' => $data['title']
    ]);
}

function getBrandNames(PDO $db) {
    $brandNames = [];
    foreach (getAllBrands($db) as $brand) {
        $brandNames[$brand['id']] = $brand['title'];
    }

    return $brandNames;
}
