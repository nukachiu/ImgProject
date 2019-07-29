<?php


namespace MyApp\Model\DomainObject;


class Tier
{
    private $id;
    private $product;
    private $size;
    private $pathWithWatermark;

    private function getOrders(){

        return 1;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getPathWithWatermark()
    {
        return $this->pathWithWatermark;
    }

    /**
     * @param mixed $pathWithWatermark
     */
    public function setPathWithWatermark($pathWithWatermark): void
    {
        $this->pathWithWatermark = $pathWithWatermark;
    }
    //private $pathWith;



}