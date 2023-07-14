<?php

function addLocation($data)
{
    global $pdo;
    $sql = "INSERT INTO `locations`(`title`, `lat`, `lng`, `type`) VALUES (:title, :lat, :lng, :typ)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $data['title'], ':lat' => $data['lat'], ':lng' => $data['lng'], ':typ' => $data['type']]);
    return $stmt->rowCount();
}

function getLocations($params)
{
    global $pdo;
    $condition = '';
    if (isset($params['verified']) && in_array($params['verified'], ['0', '1'])) {
        $condition = " WHERE `verified` = {$params['verified']}";
    } elseif (isset($params['keyword'])) {
        $condition = " WHERE `verified` = 1 AND `title` LIKE '%{$params['keyword']}%'";
    }
    $sql = "SELECT * FROM `locations` {$condition}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getSelectedLocation($id)
{
    global $pdo;
    $sql = "SELECT * FROM `locations` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function toggleStatus($id): int
{
    global $pdo;
    $sql = "UPDATE `locations` SET `verified` = 1 - `verified` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->rowCount();
}