# Airport All Statistics

    GET api/all/stats

## Description
Returns all airports in system with reviews count sorted by total reviews in ascending order


## Return format
A collection JSON objects containing keys **ReviewsCount** and **Title**

- **Title** — Name/Title of the Airport.
- **ReviewsCount** — The total number of reviews given.

## Example
**Request**

    api/all/stats

**Response** __shortened for example purpose__
``` json
{
  "data": [
    {
      "title": "Naples Municipal Airport",
      "ReviewsCount": "1"
    },
    {
      "title": "Waco Airport",
      "ReviewsCount": "1"
    },
    {
      "title": "Westerland Airport",
      "ReviewsCount": "1"
    },
    {
      "title": "Xining Airport",
      "ReviewsCount": "1"
    }
  ]
}
```
