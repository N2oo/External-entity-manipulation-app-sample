<?php
namespace App\Entity\Serialized;

use Symfony\Component\Serializer\Annotation\SerializedName;
/**
 * Nested Property of Beer Object, defining numerical data
 *  
 * If API is down, please take a look at file sampleResponse.json located in /public/assets/ to understand entity structure
 */
class Rating{

    #[SerializedName('average')]
    public float $average;
    
    #[SerializedName('reviews')]
    public int $reviews;

    /**
     * Get the value of reviews
     */ 
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Set the value of reviews
     *
     * @return  self
     */ 
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * Get the value of average
     */ 
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * Set the value of average
     *
     * @return  self
     */ 
    public function setAverage($average)
    {
        $this->average = $average;

        return $this;
    }
}