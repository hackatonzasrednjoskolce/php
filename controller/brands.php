<?php

require 'utils/db.php';
require 'utils/view.php';
require 'model/brand.php';

function getBrandListAction() {
    $db = dbConnect();

    renderView('brands', [ 'brands' => getAllBrands($db)]);
}

function addBrandAction(array $data) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db = dbConnect();
        addBrand($db, $data);
        redirect('/brands');
        return;
    }

    renderView('add_brand');
}
