<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'email',
        'password',
        'type',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, table: 'role_users', foreignPivotKey: 'user_id', relatedPivotKey: 'role_id');
    // }
    // protected function type(): Attribute
    // {
    //     return new Attribute(
    //         get: fn($value) => ["user", "admin", "manager"][$value],
    //     );
    // }
    // public function CheckPermissionAccess($permissionCheck)
    // {
    //     $roles = auth()->user()->roles;
    //     foreach ($roles as $role) {
    //         $permissions = $role->permissions;
    //         if ($permissions->contains('key_permissions', $permissionCheck)) {
    //             return true;
    //         }
    //     }
    //     return false;
    //     // return true;
    // }
}
