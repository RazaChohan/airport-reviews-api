<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class File extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "files";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}