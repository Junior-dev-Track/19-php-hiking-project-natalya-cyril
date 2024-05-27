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
        $stmt = $database->query("SELECT id, name, distance, duration, elevation_gain, description, created_at, updated_at FROM Hikes LIMIT :limit OFFSET :offset", ['limit' => $itemsPerPage, 'offset' => $offset]);
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
    public static function getHikeTags(int $hikeId): array
    {
        $database = new self();
        $stmt = $database->query("SELECT Tags.tag_name FROM HikeTags INNER JOIN Tags ON HikeTags.tag_id = Tags.ID WHERE HikeTags.hike_id = :id", ['id' => $hikeId]);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }

    public static function getHikesByTag(string $tag, int $page = 1, int $itemsPerPage = 6): array
    {
        $offset = ($page - 1) * $itemsPerPage;
        $database = new self();

        // SQL query to get hikes filtered by tag
        $sql = "SELECT Hikes.* FROM Hikes 
            JOIN HikeTags ON Hikes.id = HikeTags.hike_id 
            JOIN Tags ON HikeTags.tag_id = Tags.ID 
            WHERE Tags.tag_name = :tag 
            LIMIT :offset, :itemsPerPage";

        // Prepare and execute the query
        $stmt = $database->query($sql, [
            ':tag' => $tag,
            ':offset' => $offset,
            ':itemsPerPage' => $itemsPerPage
        ]);

        // Return the results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}
