<?php

function getAllCars(PDO $db) {
    $carsStatement = $db->prepare('SELECT * FROM car');
    $carsStatement->execute();

    return $carsStatement->fetchAll();
}

function getCarsFiltered(PDO $db, array $filters) {
    $carsStatement = $db->prepare('SELECT * FROM car WHERE brand_id = :brand');
    $carsStatement->execute($filters);

    return $carsStatement->fetchAll();
}

function getCar(PDO $db, $id) {
    $carStatement = $db->prepare('SELECT * FROM car WHERE id = :id');
    $carStatement->execute(['id' => $id]);

    return $carStatement->fetch();
}

function addCar(PDO $db, array $data) {
    $insertStatement = $db->prepare('INSERT INTO car (brand_id, model, num_of_door, year_made) VALUES (:brand, :model, :doors, :year)');
    $insertStatement->execute([
        'model' => $data['model'],
        'year' => $data['year'],
        'doors' => $data['doors'],
        'brand' => $data['brand'],
    ]);
}

function editCar(PDO $db, $id, array $data) {
    $updateStatement = $db->prepare('UPDATE car SET brand_id = :brand, model = :model, num_of_door = :doors, year_made = :year WHERE id = :id');
    $updateStatement->execute([
        'model' => $data['model'],
        'year' => $data['year'],
        'doors' => $data['doors'],
        'brand' => $data['brand'],
        'id' => $id,
    ]);
}

function deleteCar(PDO $db, $id) {
    $deleteStatement = $db->prepare('DELETE FROM car WHERE id = :id');
    $deleteStatement->execute(['id' => $id,]);
}
