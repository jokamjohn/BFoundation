<?php


namespace Bluecollar\Training;


class TrainingPublishedCommand
{
    public $title;
    public $phoneNumber;
    public $contactName;
    public $venue;
    public $location;
    public $description;
    public $date;
    public $categoryId;
    public $organisation;

    /**
     * TrainingPublishedCommand constructor.
     * @param $title
     * @param $phoneNumber
     * @param $contactName
     * @param $venue
     * @param $location
     * @param $description
     * @param $date
     * @param $categoryId
     * @param $organisation
     */
    public function __construct($title, $phoneNumber, $contactName, $venue, $location, $description, $date, $categoryId, $organisation)
    {
        $this->title = $title;
        $this->phoneNumber = $phoneNumber;
        $this->contactName = $contactName;
        $this->venue = $venue;
        $this->location = $location;
        $this->description = $description;
        $this->date = $date;
        $this->categoryId = $categoryId;
        $this->organisation = $organisation;
    }
}