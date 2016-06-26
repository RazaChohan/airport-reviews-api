<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "airports";
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
}