<?php
namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRole{
    public function roles():BelongsToMany{
        return $this->belongsToMany(Role::class);
    }
    /**
    * return belongstomany
    */
    public function hasRole(string $role):bool{
        return $this->roles()->whereName($role)->exists();
    }

    public function password():Attribute{
       return new Attribute(set: function($value){
        if (!empty($value) && !is_null($value)){
            return bcrypt($value);
        }
        });
    }
    public function hasRoles(array $nomes):bool{
        return $this->roles()->whereIn('name', $nomes)->exists();
    }
    public function hasPermission(string $permission): bool
    {
        return $this->roles()->whereHas('permissions', function($query)use($permission){
            $query->whereName($permission);
        })->exists();
    }

}
