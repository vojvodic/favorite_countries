<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * Get the comments for country
     */
    public function countryComments()
    {
        return $this->hasMany(CountryComment::class);
    }
}
