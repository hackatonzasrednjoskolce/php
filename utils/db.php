<?php

function dbConnect()
{
    return new PDO('sqlite:cars.sqlite3');
}
