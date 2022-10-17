<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Roles;
use App\Enums\Sex;
use App\Enums\UserStatus;
use App\Models\Traits\HasRole;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes;

    use HasApiTokens, HasFactory, HasRole, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'password',
        'sex',
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        $fullName = "{$this->last_name} {$this->first_name} {$this->middle_name}";

        return trim($fullName) ?: '-';
    }

    /**
     * @return string
     */
    public function getSexNameAttribute(): string
    {
        return Sex::getMappedNameByValue($this->getAttribute('sex'));
    }

    /**
     * @return string
     */
    public function getRoleNameAttribute(): string
    {
        return $this->roles()->value('name');
    }

    /**
     * @return string
     */
    public function getRoleSlugAttribute(): string
    {
        return $this->roles()->value('slug');
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    /**
     * @return HasMany
     */
    public function visit(): HasMany
    {
        return $this->hasMany(Visit::class, 'label_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeManagement(): Builder
    {
        return User::query()
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->whereIn('roles.slug', Roles::getManagementRoles());
    }

    /**
     * @return $this
     */
    public function block(): self
    {
        $this->setAttribute('status', UserStatus::BLOCKED->value);

        return $this;
    }

    /**
     * @return $this
     */
    public function unblock(): self
    {
        $this->setAttribute('status', UserStatus::ACTIVE->value);

        return $this;
    }
}
