<?php

namespace App;

trait HasRoles {
	public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role) // $user->assignRole('manager')
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }


    public function hasRole($role)
    {
        if (is_string($role)) {
            // Give me a user with a role that contains
            // The name of the role allowed
            return $this->roles->contains('name', $role); 
        }

        // 1st option if the given value is a collection:
        // We can call them recursively
        // foreach ($role as $r) {
        //     if ($this->hasRole($r->name)) {
        //         return true;
        //     }
        // } 
        // return false;

        // The intersection method allows us to remove any items from the role collection that are not present in the variable
        // The !! returns a boolean value
        return !! $role->intersect($this->roles)->count();  
    }
}