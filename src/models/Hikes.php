<?php
declare(strict_types=1);

namespace Models;

use PDO;

class Hikes extends Database
{

    public function getAllNames(): array
    {
        $stmt = $this->query("SELECT name FROM Hikes");
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $hikes;
    }
}
