<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Review extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "reviews";
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

    public function getSpecificRatioReviews($airportName, $ratio)
    {
        return self::join('airports','airports.id','=', 'reviews.airport_id')
                    ->join('authors','authors.id','=','reviews.author_id')
                    ->where('airports.name', '=', $airportName)
                    ->where('reviews.overall_rating','>', $ratio)
                    ->get(['airports.name as AirportName', 'authors.name as AuthorName',
                           'reviews.content as ReviewContent' , 'reviews.overall_rating as OverallRating']);
    }
}