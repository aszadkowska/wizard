<?php

namespace App\Model\UUID;

use DateTime;

class Key
{
    /** @var string */
    protected $date;

    /** @var string */
    protected $keys;

    public function __construct(
        string $date,
        string $keys
    ) {
        $this->date = $date;
        $this->keys = $keys;
    }

    public function date(): DateTime
    {
        return date_create($this->date);
    }

    public function keys(): string
    {
        return $this->keys;
    }
}
