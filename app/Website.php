<?php

namespace App;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hyn\Tenancy\Abstracts\SystemModel;
use Hyn\Tenancy\Contracts\Website as WebsiteContract;
use App\Mutators\WebsiteMutator as WebsiteMutator;

class Website extends SystemModel implements WebsiteContract
{
    /**
     * App\Website
     *
     * @property int $id
     * @property string $uuid
     * @property string $name
     * @property string|null $description
     * @property string|null $managed_by_database_connection
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property int $customer_id
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Hostname[] $hostnames
     * @property-read \App\Customer $owner
     */

    use UsesSystemConnection, WebsiteMutator, SoftDeletes;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'name', 'description', 'managed_by_database_connection'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'uuid', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'null'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'customer_id' => 'integer',
        'name' => 'string',
        'descripton' => 'string',
        'managed_by_database_connection' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Returns the domain names associated with the site.
     *
     * @return HasMany
     */
    public function hostnames(): HasMany
    {
        return $this->hasMany(Hostname::class);
    }

    /**
     * Returns the customer of this website
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
