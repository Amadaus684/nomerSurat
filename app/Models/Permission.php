<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Models\Concerns\LogsActivity;

class Permission extends SpatiePermission
{
    use LogsActivity;
}
