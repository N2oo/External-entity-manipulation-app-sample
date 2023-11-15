<?php

namespace App\Service\Proxy;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Service\BeerSorter;
use App\Service\Enumerations\BeerSorterAvailableMethods;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\RetryableHttpClient;
use Symfony\Component\HttpFoundation\Response;

class BeerProxy{
    private HttpClientInterface $client;

    public function __construct(
        private string $beerApiUrl,
        private SerializerInterface $serializer,
        private readonly BeerSorter $beerSorter)
    {
        $client = HttpClient::create();
        $this->client = new RetryableHttpClient($client);
    }


    /**
     * Execute request to the sample API then @return Beer[].
     * could @throws Exception if Request Failed
     */
    public function findAleBeers():array
    {
        $response = $this->client->request("GET", $this->beerApiUrl);

        $response->getStatusCode();
        if($response->getStatusCode() != Response::HTTP_OK){
            throw new \Exception("Request failed", 1);
        }


        // Getting JSON content from response
        $rawData = $response->getContent();

        // Deserialize JSON array into object array
        $beerList = $this->serializer->deserialize($rawData, 'App\Entity\Serialized\Beer[]','json');
        return $beerList;
    }

    /**
     * @return Beer[] sorted by name
     */
    public function findAleBeersSortedByName(){
        return $this->beerSorter->customSorting(
            $this->findAleBeers(),
            BeerSorterAvailableMethods::SORT_BY_NAME
        );
    }

    /**
     * @return Beer[] sorted by Rating
     */
    public function findAleBeersSortedByRating(){
        return $this->beerSorter->customSorting(
            $this->findAleBeers(),
            BeerSorterAvailableMethods::SORT_BY_RATING
        );
    }

    /**
     * @return Beer[] sorted by review amount
     */
    public function findAleBeersSortedByReviewAmount(){
        return $this->beerSorter->customSorting(
            $this->findAleBeers(),
            BeerSorterAvailableMethods::SORT_BY_REVIEW_AMOUNT
        );
    }

        /**
     * @return Beer[] sorted by Ratio
     */
    public function findAleBeersSortedByRatio(){
        return $this->beerSorter->customSorting(
            $this->findAleBeers(),
            BeerSorterAvailableMethods::SORT_BY_RATIO
        );
    }

    /**
     * @return Beer[] sorted by price
     */
    public function findAleBeersSortedByPrice(){
        return $this->beerSorter->customSorting(
            $this->findAleBeers(),
            BeerSorterAvailableMethods::SORT_BY_PRICE
        );
    }
}