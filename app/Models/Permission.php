<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='admin_permissions';   

    protected $fillable=['name','label','description','cid','icon']; 

    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_permission_role','permission_id','role_id');
    }

}
