<?php
class Product
{


    private int $id;
    private string $frontImg;
    private string $backImg;
    private string $brand;
    private string $name;
    private float $price;
    private bool $isInFavorites;
    private array $badges = [];
    private float $discountPrice = 0;



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of frontImg
     */
    public function getFrontImage()
    {
        return 'resources/img/' . $this->frontImg;
    }

    /**
     * Set the value of frontImg
     *
     * @return  self
     */
    public function setFrontImage($frontImg)
    {
        $this->frontImg = $frontImg;

        return $this;
    }

    /**
     * Get the value of backImg
     */
    public function getBackImage()
    {
        return 'resources/img/' . $this->backImg;
    }

    /**
     * Set the value of backImg
     *
     * @return  self
     */
    public function setBackImage($backImg)
    {
        $this->backImg = $backImg;

        return $this;
    }

    /**
     * Get the value of brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscountPrice()
    {
        foreach ($this->badges as $badge) {
            if (empty($badge->getTag())) {
                $this->discountPrice = $this->price - ($this->getPrice() * ($badge->getRealDiscount() / 100));
            }
        }
        return $this->discountPrice;
    }
    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of isInFavorites
     */
    public function getIsInFavorites()
    {
        return $this->isInFavorites;
    }

    /**
     * Set the value of isInFavorites
     *
     * @return  self
     */
    public function setIsInFavorites($isInFavorites)
    {
        $this->isInFavorites = $isInFavorites;

        return $this;
    }

    /**
     * Set the value of badges
     *
     * @return  self
     */
    public function setBadges($type, $value)
    {
        $badge = new Badge();
        if ($type === "discount") {
            $badge->setDiscount($value);
        } else if ($type === "tag") {
            $badge->setTag($value);
        }

        $this->badges[] = $badge;

        return $this;
    }

    /**
     * Get the value of badges
     */
    public function getBadges()
    {
        return $this->badges;
    }
}
