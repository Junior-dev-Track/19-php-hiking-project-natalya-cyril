<?php
declare(strict_types=1);

namespace Models;

use PDO;

class Hikes extends Database
{

    public function getAllNames(int $page = 1, int $itemsPerPage = 10): array
    {
        $offset = ($page - 1) * $itemsPerPage;
        $stmt = $this->query("SELECT name FROM Hikes LIMIT :limit OFFSET :offset", ['limit' => $itemsPerPage, 'offset' => $offset]);
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
}
