<?php

namespace App\Listeners;

use Tenancy\Hooks\Database\Events\Drivers\Configuring;

class ConfigureTenantDatabase
{
    /**
     * Handle the event.
     *
     * @param  Configuring  $event
     * @return void
     */
    public function handle(Configuring $event)
    {
        // TODO: Find a way to replace '%' with IP address of the accessing machine
        $event->useConnection('mysql', ['host' => '%'] + $event->defaults($event->tenant));
    }
}
