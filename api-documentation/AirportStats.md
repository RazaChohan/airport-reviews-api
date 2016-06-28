# Specific Airport Statistics

    GET api/{airport}/stats

## Description
Returns statistics of a particular airport with number of reviews, average overall rating, number of recommendations and airport name. 


## Return format
A JSON object containing keys **ReviewsCount** , **Title**, **AverageOverallRating**, **RecommendationCount**

- **Title** — Name/Title of the Airport.
- **ReviewsCount** — The total number of reviews given.
- **AverageOverallRating** — The average of all overall ratings for this particular airport
- **RecommendationCount** — The number of recommendations for this particular airport


## Example
**Request**

    api/{airport}/stats

**Response** 
``` json
{
  "data": [
    {
      "AirportName": "Aalborg Airport",
      "ReviewsCount": "10",
      "AverageOverallRating": "4.60",
      "RecommendationCount": "3"
    }
  ]
}
```
