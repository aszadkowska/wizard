<?php

namespace App\Infrastructure\UUID;

use App\Infrastructure\DatabaseRepository;
use App\Model\UUID\Keys;
use App\Model\UUID\Key;

class KeyRepository extends DatabaseRepository implements Keys
{
    private const TABLE_NAME = 'date_keys';

    public function insert(Key $data)
    {
        $this->query(self::TABLE_NAME)->insert([
                'date' => $data->date(),
                'keys' => $data->keys()
            ]
        );
    }
}
