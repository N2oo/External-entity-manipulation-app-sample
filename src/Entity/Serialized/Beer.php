<?php
namespace App\Entity\Serialized;

use Symfony\Component\Serializer\Annotation\SerializedName;
/**
 * Object Mapping of a beer according to the response apearence.
 * 
 * 
 * If API is down, please take a look at file sampleResponse.json located in /public/assets/ to understand entity structure
 */
class Beer{

    #[SerializedName('id')]
    public int $id;
    
    #[SerializedName('price')]
    public string $price;
    
    #[SerializedName('name')]
    public string $name;
    
    #[SerializedName('image')]
    public string $image;
    
    #[SerializedName('rating')]
    public Rating $rating;

    /**
     * A ratio calculated proportionnaly to Average rating / cnt Reviews
     * @return float|null
     */
    public function getRatio(): ?float
    {
        // Vérifier si rating et votants sont définis
        if ($this->getRating() && $this->getRating()->getReviews() > 0) {
            // Calculer le ratio
            return $this->getRating()->getAverage() / $this->getRating()->getReviews();
        }

        return null;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating():Rating
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice():float
    {
        $value = (float) str_replace("$","",$this->price);
        return $value;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice(string $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage():string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }
}