<?php


namespace App\Model\UUID;

use App\Model\Factory;

class KeyFactory implements Factory
{
    public function create(array $data): Key
    {
        return new Key(
            date('Y-m-d', strtotime($data[0])),
            $data[1]
        );
    }
}
