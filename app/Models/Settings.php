<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'value'
    ];

    /**
     * Remap settings for better accessibility
     *
     * @return object
     */
    public static function getLabelValue(){
      $settings = [];
      foreach (self::get() as $value) {
        $settings[$value->label] = $value->value;
      }
      return (object) $settings;
    }
}
