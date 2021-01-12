<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant as TenantContract;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;
use Tenancy\Tenant\Events\Created as TenantCreated;
use Tenancy\Tenant\Events\Deleted as TenantDeleted;
use Tenancy\Tenant\Events\Updated as TenantUpdated;

class Tenant extends Model implements TenantContract, IdentifiesByHttp
{
    use AllowsTenantIdentification;

    protected $dispatchesEvents = [
        'created' => TenantCreated::class,
        'updated' => TenantUpdated::class,
        'deleted' => TenantDeleted::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subdomain',
    ];

    /**
     * The actual value of the key for the tenant Model.
     *
     * @return string
     */
    public function getTenantKey(): string
    {
        return md5($this->id . $this->created_at->timestamp);
    }

    /**
     * Specify whether the tenant model is matching the request.
     *
     * @param Request $request
     * @return TenantContract|null
     */
    public function tenantIdentificationByHttp(Request $request): ?TenantContract
    {
        [$subdomain] = explode('.', $request->getHost(), 2);

        return $this->query()->where('subdomain', $subdomain)->first();
    }
}
