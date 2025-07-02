<?php

namespace Mars\Bin;

class Modules extends Base
{
    public protected(set) string $title = 'Manage Modules';

    public protected(set) array $actions = ['modules', 'module'];

    public protected(set) array $command_descriptions = [
        'modules:list' => 'List all modules',
        'module:install' => 'Installs a module',
        'module:upgrade' => 'Upgrades a module',
        'module:uninstall' => 'Uninstalls a module'
    ];

    public function execute(string $command)
    {

    }
}