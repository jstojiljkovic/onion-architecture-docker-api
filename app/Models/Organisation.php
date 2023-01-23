<?php

namespace App\Models;

use Database\Factories\OrganisationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Organisation
 *
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static OrganisationFactory factory( ...$parameters )
 * @method static Builder|Organisation newModelQuery()
 * @method static Builder|Organisation newQuery()
 * @method static Builder|Organisation query()
 * @mixin Eloquent
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Organisation whereCreatedAt($value)
 * @method static Builder|Organisation whereId($value)
 * @method static Builder|Organisation whereName($value)
 * @method static Builder|Organisation whereUpdatedAt($value)
 */
class Organisation extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organisation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the users for the organisation
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}