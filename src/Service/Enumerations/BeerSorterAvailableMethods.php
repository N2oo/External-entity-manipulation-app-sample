<?php

namespace App\Service\Enumerations;
enum BeerSorterAvailableMethods:string
{
    case SORT_BY_NAME = "compareByName";
    case SORT_BY_PRICE = "compareByPrice";
    case SORT_BY_RATING = "compareByRating";
    case SORT_BY_REVIEW_AMOUNT = "compareByReviewAmount";
    case SORT_BY_RATIO = "compareByRatio"; 
}