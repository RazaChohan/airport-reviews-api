<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "authors";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * One to one relationship with country
     *
     */
    public function country()
    {
        return $this->hasOne('App\Models\Country', 'country_id');
    }
}