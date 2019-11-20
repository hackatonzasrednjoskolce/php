<?php

function renderView($name, array $vars = []) {
    extract($vars);
    include dirname(__DIR__) . '/templates/' . $name . '.php';
}

function redirect(string $url) {
    header("Location: $url");
}

function notFoundPage() {
    http_response_code(404);
}
