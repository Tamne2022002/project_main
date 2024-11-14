<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_roles';

    protected $fillable = [
        'name',
        'display_name',
    ];

    public function permissions()
    {
        return $this->belongsToMany(
            PermissionModel::class,
            'table_permission_role',   
            'id_role',                 
            'id_permission'
        );
    }
}
