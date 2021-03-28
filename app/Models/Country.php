<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get the comments for country
     */
    public function comments()
    {
        return $this->hasMany(CountryComment::class);
    }
}
