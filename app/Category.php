<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Category extends Model

{

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // public function categoryUser(): BelongsToMany
    // {
    //     return $this->belongsToMany(CategoryUsers::class)
    //         ->withPivot('category_users');
    // }
}
