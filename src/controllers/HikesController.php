<?php
declare(strict_types=1);
namespace Controllers;

use Models\Hikes;

class HikesController
{
    public  static function test(){
        echo 'test';

    }

    public static function getHikeNames(): array
    {
        $hikesModel = new Hikes();
        return $hikesModel->getAllNames();
    }
    
}