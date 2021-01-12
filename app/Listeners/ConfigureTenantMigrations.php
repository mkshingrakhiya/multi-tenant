<?php

namespace App\Listeners;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;

class ConfigureTenantMigrations
{
    /**
     * Handle the event.
     *
     * @param  ConfigureMigrations  $event
     * @return void
     */
    public function handle(ConfigureMigrations $event)
    {
        $event->path(database_path('migrations/tenant'));
    }
}
