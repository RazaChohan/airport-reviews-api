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
    /**
     * Get Airport With Num Reviews
     *
     * @return array
     */
    public function getAirportsWithNumReviews()
    {
        return self::join('reviews', 'airports.id', '=', 'reviews.airport_id')
                    ->selectRaw('airports.title, count(reviews.id) as ReviewsCount')
                    ->orderBy('ReviewsCount')
                    ->groupBy('airports.id')
                    ->get();
    }
    public function getAirportStats($airportId)
    {
        return self::join('reviews', 'airports.id', '=', 'reviews.airport_id')
                    ->where('airports.id', '=', $airportId)
                    ->selectRaw('airports.title as AirportName ,count(reviews.id) as ReviewsCount,
                                round(avg(reviews.overall_rating),2) as AverageOverallRating,
                                count(case when reviews.recommended = 1 then 1 else null end) as RecommendationCount')
                    ->get();
    }

    public function getAirportReviews($airportId)
    {
        return self::join('reviews', 'airports.id', '=', 'reviews.airport_id')
                   ->join('authors', 'authors.id', '=','reviews.author_id')
                   ->join('countries', 'countries.id', '=', 'authors.country_id')
                    ->where('airports.id', '=', $airportId)
                    ->selectRaw('reviews.overall_rating as OverallRating, countries.name as AuthorCountry,
                                reviews.review_date as RecommendationData, reviews.content as Content')
                    ->get();
    }

}