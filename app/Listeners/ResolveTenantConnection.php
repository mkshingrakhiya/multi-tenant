<?php

namespace App\Listeners;

use Tenancy\Affects\Connections\Contracts\ProvidesConfiguration;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Affects\Connections\Events\Drivers\Configuring;
use Tenancy\Identification\Contracts\Tenant;

class ResolveTenantConnection implements ProvidesConfiguration
{
    /**
     * Handle the event.
     *
     * @param  Resolving  $event
     * @return void
     */
    public function handle(Resolving $event)
    {
        return $this;
    }

    /**
     * Fire an event to configure the connection.
     *
     * @param Tenant $tenant
     * @return array
     */
    public function configure(Tenant $tenant): array
    {
        $config = [];

        event(new Configuring($tenant, $config, $this));

        return $config;
    }
}
