<?php

use database\QueryBuilder;

$tasks = QueryBuilder::get('tasks');

require 'resources/index.view.php';