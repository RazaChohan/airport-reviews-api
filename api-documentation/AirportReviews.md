# Airport Reviews

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

```
