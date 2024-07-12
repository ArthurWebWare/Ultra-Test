<?php

namespace App\Enums\Attribute;

use Attribute;

#[Attribute]
class Description
{
    public function __construct(public string $description)
    {
    }
}
