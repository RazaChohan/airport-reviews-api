<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Country extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "countries";
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
     * Inverse One to many relationship between Author and Country.
     *
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Author', 'country_id');
    }

}