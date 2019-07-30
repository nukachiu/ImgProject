<?php


namespace MyApp\Model\DomainObject;


class Product
{
    private $id;
    private $userId;
    private $title;
    private $description;
    private $cameraSpecs;
    private $captureDate;
    private $thumbnailPath;

    /**
     * Product constructor.
     * @param $id
     * @param $userId
     * @param $title
     * @param $description
     * @param $cameraSpecs
     * @param $captureDate
     * @param $thumbnailPath
     */
    public function __construct($userId, $title, $description, $cameraSpecs, $captureDate, $thumbnailPath,$id=null)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
        $this->cameraSpecs = $cameraSpecs;
        $this->captureDate = $captureDate;
        $this->thumbnailPath = $thumbnailPath;
    }

    private function getTiers(){

        return 0;
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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return string
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCameraSpecs()
    {
        return $this->cameraSpecs;
    }

    /**
     * @param mixed $cameraSpecs
     */
    public function setCameraSpecs($cameraSpecs): void
    {
        $this->cameraSpecs = $cameraSpecs;
    }

    /**
     * @return mixed
     */
    public function getCaptureDate()
    {
        return $this->captureDate;
    }

    /**
     * @param mixed $captureDate
     */
    public function setCaptureDate($captureDate): void
    {
        $this->captureDate = $captureDate;
    }

    /**
     * @return mixed
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }

    /**
     * @param mixed $thumbnailPath
     */
    public function setThumbnailPath($thumbnailPath): void
    {
        $this->thumbnailPath = $thumbnailPath;
    }
}