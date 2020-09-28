<?php

namespace LaravelEnso\DataImport\Upgrades;

use LaravelEnso\Upgrade\Contracts\MigratesStructure;
use LaravelEnso\Upgrade\Traits\StructureMigration;

class StuckPermission implements MigratesStructure
{
    use StructureMigration;

    protected array $permissions = [
        ['name' => 'import.reject', 'description' => 'Reject stuck imports', 'is_default' => false],
    ];

    protected array $roles = ['admin'];
}
