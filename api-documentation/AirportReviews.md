# Specific Airport Reviews

    GET api/{airport}/reviews

## Description
Returns reviews of a particular airport with overall ratings, country of author, date of recommendation and content of review

## Parameters
- **airport** — Unique Identifier of airport

## Return format
A collection JSON objects containing keys **OverallRating** , **AuthorCountry**, **RecommendationDate**, **Content**

- **OverallRating** — Overall rating of a particular review for Airport.
- **AuthorCountry** — The country of author by whom review was given/submitted.
- **RecommendationDate** - The recommendation date is the date on which review was given
- **Content** - The content of the review 


## Example
**Request**

    api/all/stats

**Return** __shortened for example purpose__
``` json
{
  "data": [
    {
      "OverallRating": "2.00",
      "AuthorCountry": "United Kingdom",
      "RecommendationData": "2015-07-21",
      "Content": "This airport gets worse on a monthly basis. They have spent 3 million pounds on a new front door when it needs bigger and up to date security. Anymore than one plane makes the queue terrible. Arrivals is so small you queue outside if you are sat at the back of the plane and then wait for the smallest baggage belt I have ever seen (I travel every week). It is by far the poorest airport I have had the unfortunate pleasure to use. I recommend using Edinburgh and commuting!"
    },
    {
      "OverallRating": "8.00",
      "AuthorCountry": "Romania",
      "RecommendationData": "2015-06-24",
      "Content": "Small airport, our arrival was on Saturday, June 13, 10:30 PM. Unfortunately, there were three planes landed at the same time approx, and ours was the third, So we had to wait in lane in a crowded tiny corridor for frontier controls, but staff was efficient. Than we stayed in lane to get a taxi to reach city center for 45 mins. Departure was on Monday, June 22, at 12:10 PM, much better, smooth drop-off and security controls, no problem. Limited offer for eat/ drink and shopping, not overpriced, The Granite-City Restaurant in the main hall seemed to be OK! "
    }
  ]
}
```
