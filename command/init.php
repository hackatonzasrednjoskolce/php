<?php

require 'utils/db.php';

/******************************
 * Create database connection *
 ******************************/
$db = dbConnect();


/*************************************
 * Initialize tables in the database *
 *************************************/
$db->exec(
    "CREATE TABLE IF NOT EXISTS car_brand (
        id INTEGER  PRIMARY KEY,
        title VARCHAR(100)
    )"
);

$db->exec(
    "CREATE TABLE IF NOT EXISTS car (
        id INTEGER PRIMARY KEY, 
        brand_id INTEGER,
        model VARCHAR(100), 
        num_of_door INTEGER,
        year_made INTEGER,
    FOREIGN KEY(brand_id) REFERENCES car_brand(id)
    )"
);


/**************************************
 * Set initial data                    *
 **************************************/

// Array with some test data to insert to database
$carBrands = [
    ['title' => 'Audi'],
    ['title' => 'BMW'],
    ['title' => 'Fiat'],
];

// Prepare INSERT statement to SQLite3 file db
$preparedStatement = $db->prepare('INSERT INTO car_brand (title) VALUES (:title)');

// Loop thru all messages and execute prepared insert statement
foreach ($carBrands as $carBrand) {
    // Execute statement
    $preparedStatement->execute($carBrand);
}



