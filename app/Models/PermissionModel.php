<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;
    protected $table = 'table_permissions';
    protected $fillable = [
        'name',
        'display_name',
    ];
    public function PermissionChildren()
    {
        return $this->hasMany(PermissionModel::class, foreignKey: 'id_parent');
    }
}
