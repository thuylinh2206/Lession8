<?php

require_once '../pdo.php';
require_once '../helper.php';

delete(['id' => $_POST['id']]);

redirectCategoryHome();