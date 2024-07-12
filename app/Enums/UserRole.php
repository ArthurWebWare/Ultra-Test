<?php

namespace App\Enums;

use App\Enums\Attribute\Description;
use App\Enums\Concerns\GetAttributes;

enum UserRole: string
{
    use GetAttributes;

    #[Description('Administrator')]
    case Administrator = 'administrator';

    #[Description('Manager')]
    case Manager = 'manager';

    #[Description('User')]
    case User = 'user';
}
