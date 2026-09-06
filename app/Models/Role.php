<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\Concerns\LogsActivity;

class Role extends SpatieRole
{
    use LogsActivity;
}
