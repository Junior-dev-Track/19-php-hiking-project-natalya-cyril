<?php
declare(strict_types=1);

namespace Models;

use PDO;

class Hikes extends Database
{

    public static function getAllNames(int $page = 1, int $itemsPerPage = 6): array
    {
        $database = new self();
        $offset = ($page - 1) * $itemsPerPage;
        $stmt = $database->query("SELECT id, name, distance FROM Hikes LIMIT :limit OFFSET :offset", ['limit' => $itemsPerPage, 'offset' => $offset]);
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $hikes;
    }

    public static function getTotalHikes(): int
    {
        $database = new Database(); // Create an instance of the Database class
        $stmt = $database->query("SELECT COUNT(*) as total FROM Hikes"); // Call the query method on the instance
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public static function getHikeById(int $id): array
    {
        $database = new self();
        $stmt = $database->query("SELECT * FROM Hikes WHERE id = :id", ['id' => $id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);
        return $hike;
    }
    public static function getHikeDetails(int $hikeId): ?array
    {
        $database = new self();
        $stmt = $database->query("SELECT * FROM Hikes WHERE id = :id", ['id' => $hikeId]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);
        return $hike;
    }


}
