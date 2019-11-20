<?php

require 'utils/db.php';
require 'utils/view.php';
require 'model/brand.php';
require 'model/car.php';

function getCarListAction(array $filters) {
    $db = dbConnect();

    $selectedBrand = $filters['brand'] ?? null;
    $cars = $selectedBrand ? getCarsFiltered($db, ['brand' => $selectedBrand]) : getAllCars($db);
    $brandNames = getBrandNames($db);

    renderView(
        'cars',
        [
            'cars' => $cars,
            'brandNames' => $brandNames,
            'selectedBrand' => $selectedBrand,
        ]
    );
}

function addCarAction(array $data) {
    $db = dbConnect();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addCar($db, [
            'model' => $data['model'],
            'year' => $data['year'],
            'doors' => $data['doors'],
            'brand' => $data['brand'],
        ]);

        redirect('/cars');
        return;
    }

    renderView('add_car', [ 'brands' => getAllBrands($db)]);
}


function editCarAction(array $filter, array $data) {
    $db = dbConnect();

    $car = null;
    if (isset($filter['car'])) {
        $car = getCar($db, $filter['car']);
    }

    if (!$car) {
        notFoundPage();
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        editCar($db, $car['id'], [
            'model' => $data['model'],
            'year' => $data['year'],
            'doors' => $data['doors'],
            'brand' => $data['brand'],
            'id' => $car['id'],
        ]);

        redirect('/cars');
        return;
    }

    $brands = getAllBrands($db);

    renderView(
        'edit_car',
        [
            'car' => $car,
            'brands' => $brands,
        ]
    );
}
function deleteCarAction(array $filter) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        notFoundPage();
        return;
    }

    $db = dbConnect();

    $car = null;
    if (isset($filter['car'])) {
        $car = getCar($db, $filter['car']);
    }

    if (!$car) {
        notFoundPage();
        return;
    }

    deleteCar($db, $car['id']);
    redirect('/cars');
}
