<?php

$DB_TYPE = 'mysql';
$DB_HOST = 'localhost';
$DB_NAME = 'crud_lession8';
$DB_USER = 'root';
$DB_PASS = '';

try {
    $conn = new PDO("{$DB_TYPE}:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die('Connect error: ' . $e->getMessage());
}


function prepareSQL($sql)
{
    global $conn;
    return $conn->prepare($sql);
}

function getAll()
{
    $sql = "SELECT * FROM categories";
    $stmt = prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function create($data)
{
    $sql = "INSERT INTO categories (name) VALUES (:name)";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}

function delete($data)
{
    $sql = "DELETE FROM categories WHERE id=:id";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}

// function edit($category_id,$newName)
// {
//     $sql = "UPDATE categories SET name = :name WHERE id = :id";
//     $stmt = prepareSQL($sql);
//     // $stmt->execute($data);
    

//     $stmt->execute([':id' => $category_id, ':name' => $newName]);
// }
function edit($data)
{
    $sql = "UPDATE categories SET name = :name WHERE id = :id";
    $stmt = prepareSQL($sql);
    $stmt->execute([':id' => $data['id'], ':name' => $data['name']]);
}
function findById($data)
{
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = prepareSQL($sql);
    $stmt->execute([':id' => $data['id']]);
    return $stmt->fetch();
}