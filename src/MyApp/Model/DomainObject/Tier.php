<?php


namespace MyApp\Model\DomainObject;


class Tier
{
    private $id;
    private $productId;
    private $size;
    private $price;
    private $pathWithWatermark;
    private $pathWithoutWatermark;

    /**
     * Tier constructor.
     * @param $id
     * @param $productId
     * @param $size
     * @param $pathWithWatermark
     * @param $pathWithoutWatermark
     * @param $price
     */
    public function __construct($productId, $size, $pathWithWatermark, $pathWithoutWatermark, $price, $id=null)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->size = $size;
        $this->pathWithWatermark = $pathWithWatermark;
        $this->pathWithoutWatermark = $pathWithoutWatermark;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPathWithoutWatermark()
    {
        return $this->pathWithoutWatermark;
    }

    /**
     * @param mixed $pathWithoutWatermark
     */
    public function setPathWithoutWatermark($pathWithoutWatermark): void
    {
        $this->pathWithoutWatermark = $pathWithoutWatermark;
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