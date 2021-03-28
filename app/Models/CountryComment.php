<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CountryComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment'
    ];

    /**
     * Get the country that owns the comment.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Format created_at to user friendly value
     */
    public function getCreatedAtAttribute($value) {
      return Carbon::parse($value)->isoFormat('MMMM Do YYYY, h:mm:ss a');
    }
}
