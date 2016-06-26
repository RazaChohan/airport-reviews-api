<?php

namespace App;

use App\Models\AirportExperience;
use App\Models\Author;
use App\Models\Country;
use App\Models\TravellerType;
use App\Models\Review;
use App\Models\Airport;
/**
 * Class to insert record from csv in database
 *
 */
class ExcelToDB
{
    /**
     * The record of csv file
     *
     */
    public $record = null;

    /**
     * Contructor
     *
     */
    public function __construct($row)
    {
        $this->record = $row;
    }

    /**
     * Insert data in db from csv
     *
     */
    public function insertDataInDb()
    {
        $countryId = $this->insertDataInCountryTable();
        $authorId = $this->insertDataInAuthorTable($countryId);
        $travellerTypeId = $this->insertDataInTravellerTypeTable();
        $airportExperienceId = $this->insertDataInAirportExperience();
        $airportId = $this->insertDataInAirportTable();
        $this->insertDataInReviewTable($airportId, $authorId, $travellerTypeId, $airportExperienceId);
    }

    /**
     * Insert data in country table
     *
     */
    private function insertDataInCountryTable()
    {
        $countryId = null;
        if (array_key_exists('author_country', $this->record)) {
            if (!IsNullOrEmptyString($this->record['author_country'])) {
                $country = Country::firstOrNew(['name' => $this->record['author_country']]);
                if (!$country->id) {
                    $country->save();
                }
                $countryId = $country->id;
            }
        }
        return $countryId;
    }

    /**
     * Insert data in traveller type table
     *
     */
    private function insertDataInTravellerTypeTable()
    {
        $travellerTypeId = null;
        if (array_key_exists('type_traveller', $this->record)) {
            if (!IsNullOrEmptyString($this->record['type_traveller'])) {
                $travellerType = TravellerType::firstOrNew(['type' => $this->record['type_traveller']]);
                if (!$travellerType->id) {
                    $travellerType->save();
                }
                $travellerTypeId = $travellerType->id;
            }
        }
        return $travellerTypeId;
    }

    /**
     * Insert data in author table
     *
     */
    private function insertDataInAuthorTable($countryId)
    {
        $authorId = null;
        if (array_key_exists('author', $this->record)) {
            if (!IsNullOrEmptyString($this->record['author'])) {
                $author = Author::firstOrNew(['name' => $this->record['author']]);
                if (!$author->id || $author->country_id != $countryId) {
                    $author->country_id = $countryId;
                    $author->save();
                }
                $authorId = $author->id;
            }
        }
        return $authorId;
    }

    /**
     * Insert data in Airport table
     *
     */
    private function insertDataInAirportTable()
    {
        $airportId = null;
        if (array_key_exists('airport_name', $this->record) || array_key_exists('link', $this->record)
            || array_key_exists('title', $this->record)
        ) {
            $shouldInsertRecord = false;
            $airportName = "";
            $link = "";
            $title = "";
            if (!IsNullOrEmptyString($this->record['airport_name'])) {
                $airportName = $this->record['airport_name'];
                $shouldInsertRecord = true;
            }
            if (!IsNullOrEmptyString($this->record['link'])) {
                $link = $this->record['link'];
                $shouldInsertRecord = true;
            }
            if (!IsNullOrEmptyString($this->record['title'])) {
                $title = $this->record['title'];
                $shouldInsertRecord = true;
            }
            if ($shouldInsertRecord) {
                $airport = Airport::firstOrNew(['name' => $airportName]);
                if (!$airport->id || $airport->title != $title || $airport->link != $link) {
                    $airport->title = $title;
                    $airport->link = $link;
                    $airport->save();
                }
                $airportId = $airport->id;
            }
        }
        return $airportId;
    }

    /**
     * Insert data in Airport Experience table
     *
     */
    public function insertDataInAirportExperience()
    {
        $airportExperienceId = null;
        if (array_key_exists('experience_airport', $this->record)) {
            if (!IsNullOrEmptyString($this->record['experience_airport'])) {
                $airportExperience = AirportExperience::firstOrNew(['experience' => $this->record['experience_airport']]);
                if (!$airportExperience->id) {
                    $airportExperience->save();
                }
                $airportExperienceId = $airportExperience->id;
            }
        }
        return $airportExperienceId;
    }

    /**
     * Insert data in Review table
     *
     */
    public function insertDataInReviewTable($airportId, $authorId, $typeTravellerId, $airportExperienceId)
    {
        if (array_key_exists('date', $this->record) || array_key_exists('content', $this->record) ||
            array_key_exists('date_visit', $this->record) || array_key_exists('overall_rating', $this->record) ||
            array_key_exists('queuing_rating', $this->record) || array_key_exists('terminal_cleanliness_rating', $this->record) ||
            array_key_exists('terminal_seating_rating', $this->record) || array_key_exists('terminal_signs_rating', $this->record) ||
            array_key_exists('food_beverages_rating', $this->record) || array_key_exists('airport_shopping_rating', $this->record) ||
            array_key_exists('wifi_connectivity_rating', $this->record) || array_key_exists('airport_staff_rating', $this->record) ||
            array_key_exists('recommended', $this->record)
        ) {

            $review = new Review;
            $review->airport_id = $airportId;
            $review->author_id = $authorId;
            $review->type_traveller_id = $typeTravellerId;
            $review->airport_experience_id = $airportExperienceId;
            if (array_key_exists('date', $this->record)) {
                $review->review_date = $this->record['date'];
            }
            if (array_key_exists('content', $this->record)) {
                $review->content = $this->record['content'];
            }
            if (array_key_exists('date_visit', $this->record)) {
                $review->date_visit = $this->record['date_visit'];
            }
            if (array_key_exists('overall_rating', $this->record)) {
                $review->overall_rating = round($this->record['overall_rating'], 2);
            }
            if (array_key_exists('queuing_rating', $this->record)) {
                $review->queuing_rating = round($this->record['queuing_rating'], 2);
            }
            if (array_key_exists('terminal_cleanliness_rating', $this->record)) {
                $review->terminal_cleanliness_rating = round($this->record['terminal_cleanliness_rating'], 2);
            }
            if (array_key_exists('terminal_seating_rating', $this->record)) {
                $review->terminal_seating_rating = round($this->record['terminal_seating_rating'], 2);
            }
            if (array_key_exists('terminal_signs_rating', $this->record)) {
                $review->terminal_signs_rating = round($this->record['terminal_signs_rating'], 2);
            }
            if (array_key_exists('food_beverages_rating', $this->record)) {
                $review->food_beverages_rating = round($this->record['food_beverages_rating'], 2);
            }
            if (array_key_exists('airport_shopping_rating', $this->record)) {
                $review->airport_shopping_rating = round($this->record['airport_shopping_rating'], 2);
            }
            if (array_key_exists('wifi_connectivity_rating', $this->record)) {
                $review->wifi_connectivity_rating = round($this->record['wifi_connectivity_rating'], 2);
            }
            if (array_key_exists('airport_staff_rating', $this->record)) {
                $review->airport_staff_rating = round($this->record['airport_staff_rating'], 2);
            }
            if (array_key_exists('recommended', $this->record)) {
                $review->recommended = $this->record['recommended'];
            }
            $review->save();
        }
    }
}
