<?php
declare(strict_types=1);
namespace Controllers;

use Models\Hikes;

class HikesController
{
//    public  static function test(){
//        echo 'tags controller test';
//
//    }

    public static function getHikeNames(int $page = 1): array
    {
        $hikesModel = new Hikes();
        return $hikesModel->getAllNames($page);
    }
    public static function getHikesByTag(string $tag, int $page = 1, int $itemsPerPage = 6): array
    {
        return Hikes::getHikesByTag($tag, $page, $itemsPerPage);
    }

    public static function getHikesByUser(int $userId): array
    {
        $hikesModel = new Hikes();
        return $hikesModel->getHikesByUser($userId);
    }
}
