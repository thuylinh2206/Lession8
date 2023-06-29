<?php

require_once '../pdo.php';
require_once '../helper.php';

create(['name' => $_POST['name']]);

redirectCategoryHome();