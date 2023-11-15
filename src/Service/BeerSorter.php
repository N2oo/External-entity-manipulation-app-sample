<?php


namespace App\Service;

use App\Entity\Serialized\Beer;
use InvalidArgumentException;
use App\Service\Enumerations\BeerSorterAvailableMethods;

class BeerSorter
{
    /**
     * Compare ratio between two Beers
     * @param Beer $beer1
     * @param Beer $beer2
     * 
     * @return int
     */
    private function compareByRatio(Beer $beer1,Beer $beer2):int
    {
        return $beer2->getRatio() > $beer1->getRatio() ? 1 : -1;
        
    }

    /**
     * Compare Name between two Beers
     * @param Beer $beer1
     * @param Beer $beer2
     * 
     * @return int
     */
    private function compareByName(Beer $beer1, Beer $beer2):int
    {
        return strcmp($beer1->getName(), $beer2->getName());
    }

    /**
     * Compare Rating Score between two Beers
     * @param Beer $beer1
     * @param Beer $beer2
     * 
     * @return int
     */
    private function compareByRating(Beer $beer1, Beer $beer2):int
    {
        return  $beer2->getRating()->getAverage() > $beer1->getRating()->getAverage() ? 1:-1;
    }

    /**
     * Compare Number of Rating votes between two Beers
     * @param Beer $beer1
     * @param Beer $beer2
     * 
     * @return int
     */
    private function compareByReviewAmount(Beer $beer1, Beer $beer2):int
    {
        return $beer1->getRating()->getReviews() - $beer2->getRating()->getReviews();
    }

    /**
     * Compare Price between two Beers
     * @param Beer $beer1
     * @param Beer $beer2
     * 
     * @return int
     */
    private function compareByPrice(Beer $beer1,Beer $beer2):int
    {
        return $beer2->getPrice() > $beer1->getPrice() ? 1 : -1;
    }



    /**
     * Use this method to sort beer array, based on sort methods available as service const
     * @throws InvalidArgumentException
     * @param array $array
     * @param BeerSorterAvailableMethods $compareFunction
     * 
     * @return array
     */
    public function customSorting(array $array, BeerSorterAvailableMethods $compareFunction): array
    {
        usort($array, [$this,$compareFunction->value]);
        return $array;
    }
}
