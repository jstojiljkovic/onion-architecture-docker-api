<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;

/**
 * App\Models\User
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $organisation_id
 * @property-read Collection|Client[] $clients
 * @property-read int|null $clients_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Organisation $organisation
 * @property-read Collection|Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory( ...$parameters )
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt( $value )
 * @method static Builder|User whereEmail( $value )
 * @method static Builder|User whereFirstName( $value )
 * @method static Builder|User whereId( $value )
 * @method static Builder|User whereLastName( $value )
 * @method static Builder|User whereOrganisationId( $value )
 * @method static Builder|User wherePassword( $value )
 * @method static Builder|User whereUpdatedAt( $value )
 * @mixin Eloquent
 * @property-read Collection|Equipment[] $equipments
 * @property-read int|null $equipments_count
 * @property-read Collection|Video[] $videos
 * @property-read int|null $videos_count
 * @property-read Collection|Workout[] $workouts
 * @property-read int|null $workouts_count
 * @property RoleEnum $role
 * @property-read Collection|WorkHour[] $workhours
 * @property-read int|null $workhours_count
 * @method static Builder|User whereRole( $value )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'organisation_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'role' => RoleEnum::class,
    ];

    /**
     * Get the organisation that owns the uses
     *
     * @return BelongsTo
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * Get the equipments for the user
     *
     * @return HasMany
     */
    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    /**
     * Get the videos for the user
     *
     * @return HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Get the workouts for the user
     *
     * @return HasMany
     */
    public function workouts(): HasMany
    {
        return $this->hasMany(Workout::class);
    }

    /**
     * Get the work-hours for the user
     *
     * @return HasMany
     */
    public function workHours(): HasMany
    {
        return $this->hasMany(WorkHour::class);
    }

    /**
     * Get the sessions that user created
     *
     * @return HasMany
     */
    public function ownedSessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    /**
     * The sessions user has joined
     *
     * @return BelongsToMany
     */
    public function joinedSessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class);
    }
}
