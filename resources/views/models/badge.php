<?php
class Badge
{

    private string $discount = "";
    private string $tag = "";



    /**
     * Get the value of discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Get the value of tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Set the value of tag
     *
     * @return  self
     */ 
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }
}
