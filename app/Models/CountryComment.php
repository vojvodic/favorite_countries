<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryComment extends Model
{
    use HasFactory;

    /**
     * Get the country that owns the comment.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
