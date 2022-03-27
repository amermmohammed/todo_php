<?php

use database\QueryBuilder;

$description = Request::get('description');

QueryBuilder::insert('tasks', [
    'description' => $description
]);

header("Location: http://localhost/php_basics");