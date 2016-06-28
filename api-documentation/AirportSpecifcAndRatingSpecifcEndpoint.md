# Specific Airport And Rating 

    GET api/{airportName}/{RatingRatio}/reviews

## Description
Returns reviews of a particular airport having overall ratings greater than value provided as parameter, this api returns
review author name, content of review, overall rating and airport name.

## Parameters
- **airportName** — Name of airport (Example: aalborg-airport)

## Return format
A collection of JSON objects containing keys **OverallRating** , **AuthorName**, **AirportName**, **Content**

- **AirportName** — The name of airport.
- **AuthorName** — The name of author.
- **OverallRating** - Overall rating of a particular review for Airport.
- **Content** - The content of the review 


## Example
**Request**

    api/{airportName}{rating}/reviews

**Response** __shortened for example purpose__
``` json
{
  "data": [
    {
      "AirportName": "aalborg-airport",
      "AuthorName": "Klaus Malling",
      "ReviewContent": "A small very effective airport with few flights. Check-in is notorious quick and staff friendly arrival very quick and busses to Aalborg frequent. Usually no problems getting taxis as well. There used to be a cafeteria but nowadays just a kiosk - but good cafeteria with reasonable prizes inside terminal. Security check quick and friendly as well. There is a nice viewing pavilion at one end of the airport. Outside note the famous \"kiss and goodbye signs\". Restrooms outside terminal however few.",
      "OverallRating": "9.00"
    },
    {
      "AirportName": "aalborg-airport",
      "AuthorName": "S Kroes",
      "ReviewContent": "This is a nice and modern airport at the moment they are expanding the airport so there is a lot of building going on but in the departure area you will not notice this very much. The Airport has got free Wifi and a small restaurant with shop on the land side. Airside you will find a small shop with pre-packed sandwiches and hot dogs and other small stuff a small duty free shop is also around but not very cheap. There is no Lounge to be found at the moment but after the expansion is completed there will be one available (around May 2013). Check-in procedures are fast and the waiting area after check-in is fine with a view on the tarmac. All in all a nice modern but small airport with expensive restaurants and shop.",
      "OverallRating": "9.00"
    }
  ]
}
```
