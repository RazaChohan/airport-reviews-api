<?php
/**
 * Created by PhpStorm.
 * User: chohan
 * Date: 6/27/16
 * Time: 10:03 PM
 */

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Review;
use Dingo\Api\Facade\API;
use Laravel\Lumen\Routing\Controller as BaseController;

class AirportController extends BaseController{

    /**
     * Fetch Airport Reviews Count
     *
     */
    public function fetchAirportReviewsCount()
    {
        $airports = new Airport();
        $data = $airports->getAirportsWithNumReviews();
        return API::response()->array(['data' => $data], 200);
    }
    /**
     * Fetch Airport Stats
     *
     * @param int $airport
     */
    public function fetchAirportStats($airport)
    {
        $airportModel = new Airport();
        $data = $airportModel->getAirportStats($airport);
        return API::response()->array(['data' => $data], 200);
    }
    /**
     * Fetch airport reviews
     *
     * @param int $airport
     */
    public function fetchAirportReviews($airport)
    {
        $airportModel = new Airport();
        $data = $airportModel->getAirportReviews($airport);
        return API::response()->array(['data' => $data], 200);
    }
    /**
     * Fetch reviews for specific rating and airport
     *
     * @param int $airport
     * @param double $ratio
     */
    public function fetchReviewForSpecificRatingAndAirport($airportName, $ratingRatio)
    {

        $reviewModel = new Review();
        $data = $reviewModel->getSpecificRatioReviews($airportName, $ratingRatio);
        return API::response()->array(['data' => $data], 200);
    }
}